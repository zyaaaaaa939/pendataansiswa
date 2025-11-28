<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Tahun Ajar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('tahun-ajar.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="kode_tahun_ajar" class="block text-gray-700 text-sm font-bold mb-2">Kode Tahun Ajar:</label>
                            <input type="text" name="kode_tahun_ajar" id="kode_tahun_ajar" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('kode_tahun_ajar') }}" required>
                            @error('kode_tahun_ajar')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="nama_tahun_ajar" class="block text-gray-700 text-sm font-bold mb-2">Nama Tahun Ajar:</label>
                            <input type="text" name="nama_tahun_ajar" id="nama_tahun_ajar" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('nama_tahun_ajar') }}" required>
                            @error('nama_tahun_ajar')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('tahun-ajar.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
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
