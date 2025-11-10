@props(['title' => 'Dashboard Admin', 'active_menu' => 'dashboard'])

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | RSUD Jombang</title> 
    
    {{-- Memuat CSS dan JS yang sudah di-bundle oleh Vite --}}
    @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-50">

    {{-- HEADER --}}
    <header class="sticky top-0 z-10 flex items-center justify-between px-8 py-3 bg-white shadow-md border-b border-gray-100">
        <div class="flex items-center">
            <button id="sidebarToggle" class="mr-6 text-rsud-blue transition duration-150 ease-in-out hover:text-rsud-blue-light focus:outline-none">
                <i data-feather="menu" class="w-6 h-6"></i>
            </button>
            <h1 class="text-xl font-bold text-rsud-blue">RSUD Jombang - Admin</h1>
        </div>
        
        <div class="relative dropdown" id="adminMenuDropdown">
            <button id="adminMenuToggle" class="flex items-center text-rsud-blue transition duration-150 ease-in-out hover:text-rsud-blue-light focus:outline-none">
                <i data-feather="user" class="w-6 h-6 mr-2"></i> 
                <span class="text-sm font-semibold">Admin Utama</span>
                <i data-feather="chevron-down" class="w-4 h-4 ml-2"></i>
            </button>
            <div class="absolute right-0 mt-3 overflow-hidden bg-white rounded-lg shadow-xl dropdown-menu w-40" id="dropdownMenu" style="display: none;">
                <a href="{{ url('/admin/profile/edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Edit Profile</a> 
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </header>

    {{-- KONTEN UTAMA --}}
    <div class="flex min-h-screen">
        {{-- SIDEBAR --}}
        <nav id="sidebar" class="sticky top-0 h-screen w-64 bg-white text-rsud-blue shadow-lg pt-8 border-r border-gray-100 transition-all duration-300">
            <h3 class="px-6 pb-4 mb-4 text-xs font-semibold uppercase text-gray-500 border-b border-gray-200 transition-all duration-300">
                Menu Navigasi
            </h3>
            
            <div class="sidebar-menu">
                <a href="{{ url('/dashboard-dummy') }}" 
                   class="flex items-center px-6 py-3 transition duration-150 ease-in-out {{ $active_menu === 'dashboard' ? 'active' : '' }}">
                    <i data-feather="home" class="w-5 h-5 mr-3"></i> 
                    <span>Dashboard</span>
                </a>

                <h3 class="px-6 pt-6 pb-2 text-xs font-semibold uppercase text-gray-500 transition-all duration-300">Manajemen Konten</h3>
                <a href="{{ url('/buat-artikel') }}" 
                   class="flex items-center px-6 py-3 {{ $active_menu === 'buat_artikel' ? 'active' : '' }}">
                    <i data-feather="file-plus" class="w-5 h-5 mr-3"></i> 
                    <span>Buat Artikel</span>
                </a>

                <a href="{{ url('/kelola-artikel') }}" 
                   class="flex items-center px-6 py-3 {{ $active_menu === 'kelola_artikel' ? 'active' : '' }}">
                    <i data-feather="list" class="w-5 h-5 mr-3"></i> 
                    <span>Kelola Artikel</span>
                </a>

                <h3 class="px-6 pt-6 pb-2 text-xs font-semibold uppercase text-gray-500 transition-all duration-300">Pengaturan</h3>
                <a href="{{ url('/edit-profile') }}" 
                   class="flex items-center px-6 py-3 {{ $active_menu === 'manajemen_admin' ? 'active' : '' }}">
                    <i data-feather="users" class="w-5 h-5 mr-3"></i> 
                    <span>Manajemen Admin</span>
                </a>
            </div>
        </nav>

        <main class="flex-grow p-8">
            {{ $slot }}
        </main>
    </div>

    <footer class="w-full bg-white border-t border-gray-200 p-4 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} RSUD Jombang. Dikelola oleh Tim IT RSUD Jombang.
    </footer>

</body>
</html>