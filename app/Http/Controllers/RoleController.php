<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IlluminateHttpRequest;
use App\Models\Role;

class RoleController extends Controller
{


    //Show the form for creating a new role.
    public function create()
    {
      return view('roles.create');
    }


     
   //Store a newly created resource in storage.
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|max:255',
      ]);
      Role::create($request->all());
      return redirect()->route(route: 'roles.index')
        ->with('success', 'Role created successfully.');
    }


    //Display a listing of the resource.
    public function index()
    {
      $roles = Role::all();
      return view('roles.index', compact('roles'));
    }



    //Remove the specified resource from storage.
    public function destroy($id)
    {
      $role = Role::find($id);
      $role->delete();
      return redirect()->route('roles.index')
        ->with('success', 'Role deleted successfully');
    }



    public function edit($id)
    {
      $role = Role::find($id);
      return view('roles.edit', compact('role'));
    }


    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|max:255',
      ]);
      $role = Role::find($id);
      $role->update($request->all());
      return redirect()->route('roles.index')
        ->with('success', 'Role updated successfully.');
    }

}
