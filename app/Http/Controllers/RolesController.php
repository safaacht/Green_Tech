<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $roles=Role::all();
        return view(('roles.index'),compact('roles'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role= new Role();
        $role->name=$request['name'];
        $role->save();

        return redirect()->route('roles.index')->with('success', 'Role ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $role=Role::findOrFail($id);
        return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $role=Role::findOrFail($id);
        return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $role=Role::findOrFail($id);
        $role->name=$request['name'];
        $role->save();

         return redirect()->route('roles.index')->with('success', 'Role mis à jour avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $role=Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role supprimé avec succès !');
    }
}
