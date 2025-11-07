<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title', 'Psikolog - RSUD Jombang')</title>

    <link rel="icon" href="favicon.ico">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../assets/styles/style.css" />
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        .icon-small {
            width: 1rem;
            height: 1rem;
            margin-right: 0.5rem;
            color: #1e40af;
            /* Warna ikon badge */
        }
    </style>
    @stack('styles')
</head>

<body x-data="{ darkMode: true, scrollTop: false, sidebarOpen: false, stickyMenu: false, navigationOpen: false }"
x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'b eh': darkMode === true }">
    <x-layout.navbar />
    <main>
        @yield('content')
    </main>
    <x-layout.footer />
    <script>
        feather.replace();
    </script>
    <script defer src="bundle.js"></script>
    @stack('scripts')
</body>

</html>
