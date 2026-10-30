@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
<form method="POST" action="/login" class="max-w-sm mx-auto mt-10 space-y-4 p-6 bg-white rounded-lg shadow-md border">
    @csrf
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Login</h2>

    <div>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="w-full border rounded p-2 focus:outline-emerald-600">
        @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <input type="password" name="password" placeholder="Password" class="w-full border rounded p-2 focus:outline-emerald-600">
        @error('password') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded p-2 transition">Sign in</button>
</form>
@endsection