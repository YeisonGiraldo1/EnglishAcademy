<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function create(){
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'role_id' => 'required|exists:roles,id',
    ]);

    $user = new User();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = bcrypt($validatedData['password']);
    $user->role_id = $validatedData['role_id'];
    $user->save();

    return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente');
}



public function index(){
    $users = User::all();
    return view('users.index', compact('users'));
}
}
