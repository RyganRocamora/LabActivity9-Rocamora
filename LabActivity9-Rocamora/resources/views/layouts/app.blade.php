<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bakuna Tracker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <nav class="bg-emerald-700 text-white p-4 shadow-md flex justify-between items-center">
        <h1 class="text-xl font-bold">Bakuna Tracker</h1>
        <div>
            @auth
                <span class="mr-4">Hi, {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-sm font-semibold">Logout</button>
                </form>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="underline font-semibold">Sign in</a>
            @endguest
        </div>
    </nav>

    <main class="container mx-auto p-6 max-w-5xl">
        @yield('content')
    </main>
</body>
</html>