<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SIP - Sistem Informasi Parkir UB' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F4F3FF] text-gray-800 antialiased min-h-screen">
    <!-- Mobile-first container -->
    <main class="max-w-lg mx-auto min-h-screen shadow-2xl bg-white relative overflow-hidden flex flex-col">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
