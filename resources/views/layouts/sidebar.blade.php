<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 bg-white border-r border-gray-200 transition-transform duration-300 ease-in-out md:translate-x-0 md:static md:inset-auto md:flex md:flex-col">
    <div class="h-16 flex items-center justify-center border-b border-gray-200 bg-white">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            <span class="font-bold text-xl text-gray-800">ZIAWEB</span>
        </a>
    </div>
    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            {{ __('Dashboard') }}
        </a>

        <div class="pt-4 pb-2">
            <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Akademik</p>
        </div>

        <a href="{{ route('tahun-ajar.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200 {{ request()->routeIs('tahun-ajar.*') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            {{ __('Tahun Ajar') }}
        </a>

        <a href="{{ route('jurusan.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200 {{ request()->routeIs('jurusan.*') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            {{ __('Jurusan') }}
        </a>

        <a href="{{ route('kelas.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200 {{ request()->routeIs('kelas.*') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            {{ __('Kelas') }}
        </a>

        <a href="{{ route('siswa.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200 {{ request()->routeIs('siswa.*') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            {{ __('Siswa') }}
        </a>

        @can('admin')
            <div class="pt-4 pb-2">
                <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Pengaturan</p>
            </div>
            <a href="{{ route('user.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200 {{ request()->routeIs('user.*') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                {{ __('User Management') }}
            </a>
        @endcan
    </nav>
</aside>
