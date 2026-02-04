@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Ajouter un produit</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nom du produit</label>
            <input type="text" name="name" required class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Prix (DH)</label>
            <input type="number" name="price" step="0.01" required class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Catégorie</label>
            <select name="category_id" required class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300">
                <option value="">Sélectionner une catégorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Image</label>
            <input type="file" name="image" class="w-full border rounded-lg px-3 py-2">
        </div>

        <div class="flex gap-4 pt-4 border-t">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 font-medium">
                Enregistrer
            </button>
            <a href="{{ route('products.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 font-medium pt-2">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection
