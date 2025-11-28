<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Banner -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 border border-gray-200">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Ini adalah halaman dashboard utama. Anda dapat mengelola data sekolah dari sini.
                    </p>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Total Siswa -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 flex items-center hover:shadow-md transition-shadow duration-200">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Total Siswa</div>
                        <div class="mt-1 text-3xl font-bold text-gray-900">{{ $totalSiswa }}</div>
                    </div>
                </div>

                <!-- Total Jurusan -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 flex items-center hover:shadow-md transition-shadow duration-200">
                    <div class="p-3 rounded-full bg-orange-100 text-orange-600 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Total Jurusan</div>
                        <div class="mt-1 text-3xl font-bold text-gray-900">{{ $totalJurusan }}</div>
                    </div>
                </div>

                <!-- Total Kelas -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 flex items-center hover:shadow-md transition-shadow duration-200">
                    <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Total Kelas</div>
                        <div class="mt-1 text-3xl font-bold text-gray-900">{{ $totalKelas }}</div>
                    </div>
                </div>

                <!-- Total User -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 flex items-center hover:shadow-md transition-shadow duration-200">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Total User</div>
                        <div class="mt-1 text-3xl font-bold text-gray-900">{{ $totalUser }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
