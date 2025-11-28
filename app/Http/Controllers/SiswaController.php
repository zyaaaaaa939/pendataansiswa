<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunAjar;
use Illuminate\Support\Facades\Storage;

use App\Models\KelasDetail;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Siswa::with(['jurusan', 'kelas', 'tahunAjar']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nisn', 'like', "%{$search}%");
            });
        }

        if ($request->filled('jurusan_id')) {
            $query->where('jurusan_id', $request->jurusan_id);
        }

        if ($request->filled('kelas_id')) {
            $query->where('kelas_id', $request->kelas_id);
        }

        $siswas = $query->latest()->paginate(10)->withQueryString();
        $jurusans = Jurusan::all();
        $kelases = Kelas::all();

        return view('siswa.index', compact('siswas', 'jurusans', 'kelases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        $kelases = Kelas::all();
        $tahunAjars = TahunAjar::all();
        return view('siswa.create', compact('jurusans', 'kelases', 'tahunAjars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiswaRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('siswas', 'public');
        }
        $siswa = Siswa::create($data);

        // Buat record kelas_detail awal
        KelasDetail::create([
            'siswa_id' => $siswa->id,
            'kelas_id' => $siswa->kelas_id,
            'tahun_ajar_id' => $siswa->tahun_ajar_id,
            'status' => 'aktif',
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $jurusans = Jurusan::all();
        $kelases = Kelas::all();
        $tahunAjars = TahunAjar::all();
        return view('siswa.edit', compact('siswa', 'jurusans', 'kelases', 'tahunAjars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, Siswa $siswa)
    {
        $data = $request->validated();
        if ($request->hasFile('foto')) {
            if ($siswa->foto) {
                Storage::disk('public')->delete($siswa->foto);
            }
            $data['foto'] = $request->file('foto')->store('siswas', 'public');
        }
        $siswa->update($data);
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        if ($siswa->foto) {
            Storage::disk('public')->delete($siswa->foto);
        }
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }

    public function promote(Siswa $siswa)
    {
        $kelases = Kelas::all();
        $tahunAjars = TahunAjar::all();
        return view('siswa.promote', compact('siswa', 'kelases', 'tahunAjars'));
    }

    public function promoteStore(Request $request, Siswa $siswa)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
        ]);

        // Nonaktifkan kelas sebelumnya
        KelasDetail::where('siswa_id', $siswa->id)
            ->where('status', 'aktif')
            ->update(['status' => 'nonaktif']);

        // Buat record kelas baru
        KelasDetail::create([
            'siswa_id' => $siswa->id,
            'kelas_id' => $request->kelas_id,
            'tahun_ajar_id' => $request->tahun_ajar_id,
            'status' => 'aktif',
        ]);

        // Update data siswa
        $siswa->update([
            'kelas_id' => $request->kelas_id,
            'tahun_ajar_id' => $request->tahun_ajar_id,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil naik/pindah kelas.');
    }
}
