@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Modifier le produit</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nom du produit</label>
            <input type="text" name="name" value="{{ $product->name }}" required class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300">{{ $product->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Prix (DH)</label>
            <input type="number" name="price" value="{{ $product->price }}" step="0.01" required class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Catégorie</label>
            <select name="category_id" required class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-green-300">
                <option value="">Sélectionner une catégorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Image</label>
            <input type="file" name="image" class="w-full border rounded-lg px-3 py-2">
            @if($product->image)
                <p class="text-sm text-gray-500 mt-1">Image actuelle : <a href="{{ $product->image }}" target="_blank" class="text-green-600 underline">Voir</a></p>
            @endif
        </div>

        <div class="flex gap-4 pt-4">
            <a href="{{ route('products.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 font-medium pt-2">
                Annuler
            </a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 font-medium">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection
