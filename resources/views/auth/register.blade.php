@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Register</h1>

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Username</label>
            <input type="text" name="username" value="{{ old('username') }}" required class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300">
            @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Email</label>
            <input name="email" value="{{ old('email') }}" required class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Password</label>
            <input type="password" name="password" required class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Confirm Password</label>
            <input type="password" name="password_confirmation" required class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300">
        </div>

        <div class="flex gap-4 pt-4 border-t">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 font-medium">
                Register
            </button>
            <a href="{{ route('login.create') }}" class="text-green-600 hover:underline py-2">Already have an account? Login</a>
        </div>
    </form>
</div>
@endsection
