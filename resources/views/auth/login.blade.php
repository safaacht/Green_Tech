@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Login</h1>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
        @csrf
            
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Email</label>
            <input name="email" value="{{ old('email') }}" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Password</label>
            <input type="password" name="password" required class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>


        <div class="flex gap-4 pt-4 border-t">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 font-medium">
                Log in
            </button>
            <a href="{{ route('register.create') }}" class="text-green-600 hover:underline py-2">Don't have an account? Register</a>
        </div>
    </form>
</div>
@endsection
