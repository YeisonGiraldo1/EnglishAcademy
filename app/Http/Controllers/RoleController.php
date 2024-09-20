<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IlluminateHttpRequest;
use App\Models\Role;

class RoleController extends Controller
{


    //function for load view of create form roles
    public function create()
    {
      return view('roles.create');
    }


    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|max:255',
      ]);
      Role::create($request->all());
      return redirect()->route(route: 'roles.index')
        ->with('success', 'Post created successfully.');
    }


 /**
   * Display a listing of the resource.
   */
    public function index()
    {
      $roles = Role::all();
      return view('roles.index', compact('roles'));
    }
    
}
