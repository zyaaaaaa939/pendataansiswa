<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Naik / Pindah Kelas: ') . $siswa->nama }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('siswa.promote.store', $siswa->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Kelas Saat Ini:</label>
                            <p class="text-gray-900">{{ $siswa->kelas->nama_kelas }} ({{ $siswa->tahunAjar->nama_tahun_ajar }})</p>
                        </div>

                        <div class="mb-4">
                            <label for="kelas_id" class="block text-gray-700 text-sm font-bold mb-2">Kelas Baru:</label>
                            <select name="kelas_id" id="kelas_id" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="">Pilih Kelas Baru</option>
                                @foreach ($kelases as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tahun_ajar_id" class="block text-gray-700 text-sm font-bold mb-2">Tahun Ajar Baru:</label>
                            <select name="tahun_ajar_id" id="tahun_ajar_id" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="">Pilih Tahun Ajar Baru</option>
                                @foreach ($tahunAjars as $tahunAjar)
                                    <option value="{{ $tahunAjar->id }}">{{ $tahunAjar->nama_tahun_ajar }}</option>
                                @endforeach
                            </select>
                            @error('tahun_ajar_id')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-4">
                            <a href="{{ route('siswa.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Batal
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
