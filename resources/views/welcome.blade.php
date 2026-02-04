@extends('layouts.app')

@section('content')
<div class="flex-1 flex flex-col items-center justify-center text-center">
    
    <h1 class="text-5xl font-bold mb-4 text-gray-800 tracking-tight">
        🌿 Bienvenue sur <span class="text-green-600">GreenTech</span>
    </h1>
    
    <p class="text-xl text-gray-600 mb-2 max-w-2xl mx-auto">
        Votre partenaire pour des solutions durables et innovantes.
    </p>
    
    <p class="text-lg text-gray-500 mb-10">
        Explorez notre catalogue et participez au changement.
    </p>

    <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 bg-green-600 text-white px-6 py-3 rounded-full text-lg font-medium hover:bg-green-700 transition-all shadow-lg hover:shadow-green-200 hover:-translate-y-1">
        voir Nos Produits
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg>
    </a>
</div>
@endsection
