@extends('layouts.app')

@section('content')
@csrf
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Register</h1>

    <form action="{{ route('register.store') }}" method="POST">
        @csrf
            
        @enderror
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Email</label>
            <input name="email"  class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Password</label>
            <input type="password" name="password" " required class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300">
        </div>


        <div class="flex gap-4 pt-4 border-t">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 font-medium">
                Log in
            </button>

        </div>
    </form>
</div>
@endsection
