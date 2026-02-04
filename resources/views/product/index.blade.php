@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Catalogue des Produits</h1>

<form method="GET" action="{{ route('products.index') }}" class="grid md:grid-cols-4 gap-4 mb-8">
    <input type="text" name="search" placeholder="Rechercher..."
           class="border rounded-lg px-4 py-2 w-full">

    <select name="category" class="border rounded-lg px-4 py-2 w-full">
        <option value="">Toutes les catégories</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <button class="bg-green-600 text-white rounded-lg px-4 py-2 hover:bg-green-700">
        Filtrer
    </button>
</form>

<div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($products as $product)
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

            <img src="{{ $product->image ?? 'https://via.placeholder.com/300x200' }}"
                 class="h-40 w-full object-cover">

            <div class="p-4">
                <h2 class="font-semibold text-lg">{{ $product->name }}</h2>
                <p class="text-sm text-gray-500">{{ $product->category->name }}</p>

                <p class="text-green-600 font-bold mt-2">{{ $product->price }} DH</p>



                <a href="{{ route('products.show', $product->id) }}"
                   class="block text-center mt-4 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                    Voir détails
                </a>
            </div>
        </div>
    @endforeach
</div>

@endsection
