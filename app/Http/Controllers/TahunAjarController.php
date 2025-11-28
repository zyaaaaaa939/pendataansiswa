<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTahunAjarRequest;
use App\Http\Requests\UpdateTahunAjarRequest;
use App\Models\TahunAjar;

class TahunAjarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunAjars = TahunAjar::latest()->paginate(10);
        return view('tahun-ajar.index', compact('tahunAjars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tahun-ajar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTahunAjarRequest $request)
    {
        TahunAjar::create($request->validated());
        return redirect()->route('tahun-ajar.index')->with('success', 'Tahun Ajar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TahunAjar $tahunAjar)
    {
        return view('tahun-ajar.show', compact('tahunAjar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TahunAjar $tahunAjar)
    {
        return view('tahun-ajar.edit', compact('tahunAjar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTahunAjarRequest $request, TahunAjar $tahunAjar)
    {
        $tahunAjar->update($request->validated());
        return redirect()->route('tahun-ajar.index')->with('success', 'Tahun Ajar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TahunAjar $tahunAjar)
    {
        $tahunAjar->delete();
        return redirect()->route('tahun-ajar.index')->with('success', 'Tahun Ajar berhasil dihapus.');
    }
}
