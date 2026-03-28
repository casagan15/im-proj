<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Product Management System')</title>

    <!-- Bootstrap CSS (Optional but recommended) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }
    </style>
</head>
<body>

     {{-- Header --}}
    @include('partials.header')

    <main class="container mt-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer') 
    
    <!-- Bootstrap JS -->
    <script src="https://cnd.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
