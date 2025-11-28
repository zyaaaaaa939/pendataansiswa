<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Kelas') }}
            </h2>
            <a href="{{ route('kelas.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Tambah Kelas
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-4" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ $message }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden sm:rounded-lg border border-gray-200 p-6">
                <div class="overflow-x-auto">
                    <table class="w-full text-md bg-white rounded mb-4">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left p-3 px-5">No</th>
                                <th class="text-left p-3 px-5">Nama Kelas</th>
                                <th class="text-left p-3 px-5">Level</th>
                                <th class="text-left p-3 px-5">Jurusan</th>
                                <th class="text-left p-3 px-5">Tahun Ajar</th>
                                <th class="text-right p-3 px-5">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kelases as $kelas)
                                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                    <td class="p-3 px-5">{{ $loop->iteration }}</td>
                                    <td class="p-3 px-5">{{ $kelas->nama_kelas }}</td>
                                    <td class="p-3 px-5">{{ $kelas->level_kelas }}</td>
                                    <td class="p-3 px-5">{{ $kelas->jurusan->nama_jurusan }}</td>
                                    <td class="p-3 px-5">{{ $kelas->tahunAjar->nama_tahun_ajar }}</td>
                                    <td class="p-3 px-5 flex justify-end">
                                        <a href="{{ route('kelas.edit', $kelas->id) }}" style="background-color: #2563EB;" class="mr-2 inline-block text-sm text-white py-1 px-3 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out hover:bg-blue-700">Edit</a>
                                        <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-block text-sm bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-6 text-center text-gray-500">
                                        Data Kelas belum tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $kelases->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
