@props(['profile'])
<x-head></x-head>

<body class="bg-gray-50 min-h-screen flex flex-col">

    {{-- Navbar --}}
    <x-navbar :profile='$profile'></x-navbar>

    {{-- Main Content --}}
    {{ $slot }}

    {{-- Footer --}}
    <x-footer :profile='$profile'></x-footer>

    {{-- JS Utama --}}
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
