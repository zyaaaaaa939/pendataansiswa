<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('kelas.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_kelas" class="block text-gray-700 text-sm font-bold mb-2">Nama Kelas:</label>
                            <input type="text" name="nama_kelas" id="nama_kelas" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('nama_kelas') }}" required>
                            @error('nama_kelas')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="level_kelas" class="block text-gray-700 text-sm font-bold mb-2">Level Kelas:</label>
                            <input type="number" name="level_kelas" id="level_kelas" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('level_kelas') }}" required>
                            @error('level_kelas')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="jurusan_id" class="block text-gray-700 text-sm font-bold mb-2">Jurusan:</label>
                            <select name="jurusan_id" id="jurusan_id" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="">Pilih Jurusan</option>
                                @foreach ($jurusans as $jurusan)
                                    <option value="{{ $jurusan->id }}" {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>{{ $jurusan->nama_jurusan }}</option>
                                @endforeach
                            </select>
                            @error('jurusan_id')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="tahun_ajar_id" class="block text-gray-700 text-sm font-bold mb-2">Tahun Ajar:</label>
                            <select name="tahun_ajar_id" id="tahun_ajar_id" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="">Pilih Tahun Ajar</option>
                                @foreach ($tahunAjars as $tahunAjar)
                                    <option value="{{ $tahunAjar->id }}" {{ old('tahun_ajar_id') == $tahunAjar->id ? 'selected' : '' }}>{{ $tahunAjar->nama_tahun_ajar }}</option>
                                @endforeach
                            </select>
                            @error('tahun_ajar_id')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('kelas.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Batal
                            </a>
                            <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
