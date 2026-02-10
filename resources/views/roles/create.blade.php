@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('roles.index') }}" class="text-gray-500 hover:text-gray-700 transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h1 class="text-3xl font-bold text-gray-800">Ajouter un Rôle</h1>
    </div>

    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
        <form action="{{ route('roles.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom du Rôle</label>
                <input type="text" name="name" id="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition" placeholder="ex: redacteur">
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition font-medium">
                    Enregistrer le Rôle
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
