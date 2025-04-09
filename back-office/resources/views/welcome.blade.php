<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome to Laravel</h1>
    <p>Laravel Version: {{ $laravelVersion }}</p>
    <p>PHP Version: {{ $phpVersion }}</p>
    @if ($canLogin)
        <a href="{{ route('login') }}">Login</a>
    @endif
</body>
</html>