<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome | Library App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body class="antialiased bg-gray-100">
    <div class="min-h-screen flex flex-col justify-center items-center">
        <h1 class="text-4xl font-bold mb-6">Welcome to the Library Management System</h1>
        <div class="space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-blue-600 hover:underline">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>
