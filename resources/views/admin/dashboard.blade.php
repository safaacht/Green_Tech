@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-8">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
        <a href="{{ route('products.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition font-medium">
            <i class="fas fa-plus mr-2"></i> Ajouter un Produit
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Produits</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $stats['total_products'] }}</h3>
                </div>
                <div class="bg-green-100 p-3 rounded-lg text-green-600">
                    <i class="fas fa-leaf text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Catégories</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $stats['total_categories'] }}</h3>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg text-blue-600">
                    <i class="fas fa-tags text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Utilisateurs</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $stats['total_users'] }}</h3>
                </div>
                <div class="bg-purple-100 p-3 rounded-lg text-purple-600">
                    <i class="fas fa-users text-xl"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- Management Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-800">Gestion des Produits</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-600">Produit</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-600">Catégorie</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-600">Prix</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-600 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($products as $product)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img src="{{ $product->image ?? 'https://via.placeholder.com/40' }}" class="w-10 h-10 rounded object-cover">
                                <span class="font-medium text-gray-800">{{ $product->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-600 rounded-full">
                                {{ $product->category->name }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600 font-medium">
                            {{ $product->price }} DH
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('products.edit', $product->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
            <a href="{{ route('products.index') }}" class="text-sm text-green-600 font-medium hover:underline">Voir tout le catalogue <i class="fas fa-arrow-right ml-1"></i></a>
        </div>
    </div>
</div>
@endsection
