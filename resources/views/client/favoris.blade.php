@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8 text-gray-800">Mes Favoris ❤️</h1>

@if($products->isEmpty())
    <div class="bg-white rounded-xl p-12 text-center shadow-sm border border-gray-100">
        <div class="text-6xl mb-4 text-gray-200">
            <i class="fas fa-heart-broken"></i>
        </div>
        <p class="text-xl text-gray-500 font-medium">Vous n'avez pas encore de favoris.</p>
        <a href="{{ route('products.index') }}" class="mt-6 inline-block bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition font-medium">
            Découvrir le catalogue
        </a>
    </div>
@else
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden border border-gray-100">
                <img src="{{ $product->image ?? 'https://via.placeholder.com/300x200' }}"
                     class="h-40 w-full object-cover">

                <div class="p-4">
                    <h2 class="font-semibold text-lg text-gray-800 truncate">{{ $product->name }}</h2>
                    <p class="text-sm text-gray-500">{{ $product->category->name }}</p>
                    <p class="text-green-600 font-bold mt-2 text-xl">{{ $product->price }} DH</p>

                    <div class="flex gap-2 mt-4">
                        <a href="{{ route('products.show', $product->id) }}"
                           class="flex-1 text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 text-sm font-medium transition">
                            Voir
                        </a>
                        
                        <form action="{{ route('favoris.toggle',$product->id) }}" method="POST" class="flex-1">
                            @method('put')
                            @csrf
                            <button class="w-full text-center bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 text-sm font-medium transition flex items-center justify-center gap-1">
                                <i class="fas fa-trash-alt"></i>
                                Retirer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
