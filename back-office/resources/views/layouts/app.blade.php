<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Vite JS and CSS -->
    @vite('resources/js/app.jsx')  <!-- Updated to app.jsx -->
    @vite('resources/css/app.css')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app"></div> <!-- This is where your React app will mount -->
    @yield('content')
</body>
</html>
