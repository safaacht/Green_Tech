@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800">Gestion des Rôles</h1>
        <a href="{{ route('roles.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition font-medium">
            <i class="fas fa-plus mr-2"></i> Ajouter un Rôle
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-600">ID</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-600">Nom du Rôle</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-600">Guard</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-600 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($roles as $role)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-gray-600">{{ $role->id }}</td>
                        <td class="px-6 py-4">
                            <span class="font-medium text-gray-800">{{ $role->name }}</span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-sm">{{ $role->guard_name }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('roles.edit', $role->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ce rôle ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
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
    </div>
</div>
@endsection
