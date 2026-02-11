<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GreenTech</title>
    {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">
<nav class="bg-green-700 text-white px-6 py-4 shadow-md flex justify-between items-center shrink-0">
    <a href="{{ url('/') }}" class="text-xl font-bold">🌿 GreenTech</a>
    <div class="space-x-4 flex items-center">
        <a href="{{ url('/') }}" class="hover:text-green-200 font-medium">Accueil</a>
        <a href="{{ route('products.index') }}" class="hover:text-green-200 font-medium">Catalogue</a>
        @guest
            <a href="{{ route('login.create') }}" class="hover:text-green-200 font-medium">Login</a>
            <a href="{{ route('register.create') }}" class="hover:text-green-200 font-medium">Sign up</a>
        @endguest

        @auth
            <div class="flex items-center space-x-4 border-r pr-4 border-green-600 mr-2">
                @foreach(Auth::user()->roles as $role)
                    <span class="px-2 py-0.5 text-[10px] uppercase tracking-wider font-bold bg-green-800 text-green-100 rounded-full border border-green-600">
                        {{ $role->name }}
                    </span>
                @endforeach
            </div>

            @hasanyrole(['admin', 'Éditeur', 'Gestionnaire'])
                <a href="{{ route('admin.dashboard') }}" class="hover:text-green-200 font-medium">Dashboard</a>
            @endhasanyrole
            
            
            @hasrole('client')
                <a href="{{ url('/client') }}" class="hover:text-green-200 font-medium">Favoris</a>
            @endhasrole
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="hover:text-green-200 font-medium">Logout</button>
            </form>
        @endauth
    </div>
</nav>

<main class="flex-1 flex flex-col overflow-hidden">
    <div class="max-w-7xl mx-auto p-6 w-full flex-1 flex flex-col">
        @yield('content')
    </div>
</main>

</body>
</html>
