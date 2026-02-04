@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden flex flex-col md:flex-row">
    
    <div class="md:w-1/2 p-6 flex items-center justify-center bg-gray-50">
        <img src="{{ $product->image ?? 'https://via.placeholder.com/400' }}" alt="{{ $product->name }}" class="max-h-96 object-cover rounded-lg">
    </div>

    <div class="md:w-1/2 p-8">
        <div class="flex justify-between items-start mb-4">
            <div>
                <span class="text-sm font-semibold text-green-600 uppercase tracking-wide">{{ $product->category->name }}</span>
                <h1 class="text-3xl font-bold text-gray-900 mt-2">{{ $product->name }}</h1>
            </div>
        </div>

        <p class="text-3xl font-bold text-green-700 mb-6">{{ $product->price }} DH</p>

        <div class="prose max-w-none text-gray-600 mb-8">
            {{ $product->description }}
        </div>

        <div class="flex flex-col gap-3">
            <a href="#" class="block w-full text-center bg-green-600 text-white font-semibold py-3 rounded-lg hover:bg-green-700 transition">
                Ajouter au panier
            </a>
            
            <div class="flex gap-3">
                <a href="{{ route('products.edit', $product->id) }}" class="flex-1 text-center bg-yellow-500 text-white font-semibold py-3 rounded-lg hover:bg-yellow-600 transition">
                    Modifier
                </a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Êtes-vous sûr ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-600 text-white font-semibold py-3 rounded-lg hover:bg-red-700 transition">
                        Supprimer
                    </button>
                </form>
            </div>
            
            <a href="{{ route('products.index') }}" class="block w-full text-center text-gray-500 hover:text-gray-700 mt-4">
                ← Retour au catalogue
            </a>
        </div>
    </div>
</div>
@endsection
