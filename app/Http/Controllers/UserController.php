<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users=User::with('roles')->get();
        return view(('users.index'),compact('users'));
        
    }

    public function create()
    {
        $roles=Role::all();
        return view('users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $user= new User();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->password=$request['password'];
        $user->save();
        $user->assignRole($request['role']);

        return redirect()->route('users.index')->with('success', 'User ajouté avec succès !');
    }

    public function show(int $id)
    {
        $user=User::findOrFail($id);
        return view('users.show',compact('user'));
    }

    public function edit(int $id)
    {
        $user=User::findOrFail($id);
        $roles=Role::all();
        return view('users.edit',compact('user','roles'));
    }

    public function update(Request $request, int $id)
    {
        $user=User::findOrFail($id);
        $user->name=$request['name'];
        $user->email=$request['email'];
        if($request->has('password') && $request->password != ""){
            $user->password=Hash::make($request['password']);
        }
        $user->save();
        $user->syncRoles($request['role']);

         return redirect()->route('users.index')->with('success', 'User mis à jour avec succès !');

    }

    public function destroy(int $id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User supprimé avec succès !');
    }
}
