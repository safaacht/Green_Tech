<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GreenTech</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">
<nav class="bg-green-700 text-white px-6 py-4 shadow-md flex justify-between items-center shrink-0">
    <a href="{{ url('/') }}" class="text-xl font-bold">🌿 GreenTech</a>
    <div class="space-x-4 flex items-center">
        <a href="{{ url('/') }}" class="hover:text-green-200 font-medium">Accueil</a>
        <a href="{{ route('products.index') }}" class="hover:text-green-200 font-medium">Catalogue</a>
        
        <a href="#" class="hover:text-green-200 font-medium">Login</a>
        <a href="#" class="hover:text-green-200 font-medium">Sign in</a>
    </div>
</nav>

<main class="flex-1 flex flex-col overflow-hidden">
    <div class="max-w-7xl mx-auto p-6 w-full flex-1 flex flex-col">
        @yield('content')
    </div>
</main>

</body>
</html>
