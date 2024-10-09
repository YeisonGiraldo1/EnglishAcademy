<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//ROUTES ROLES

// returns the form for adding a role
Route::get('/roles/create', RoleController::class . '@create')->name('roles.create');

// adds a role to the database
Route::post('/roles', RoleController::class .'@store')->name('roles.store');

// returns the home page with all roles
Route::get('/roles', RoleController::class .'@index')->name('roles.index');

Route::delete('/roles/{rol}', RoleController::class .'@destroy')->name('roles.destroy');

// returns the form for editing a role
Route::get('/roles/{role}/edit', RoleController::class .'@edit')->name('roles.edit');

// updates a role
Route::put('/roles/{role}', RoleController::class .'@update')->name('roles.update');


//ROUTE USERS

Route::get('/users/create', [UserController ::class, 'create'])->name('users.create');

Route::post('/users', [UserController ::class, 'store'])->name('users.store');

Route::get('/users', [UserController::class,'index'] )->name('users.index');

Route::get('/users', [UserController::class,'index'] )->name('users.index');

Route::delete('/users/{user}' , [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/users/{user}edit',[UserController::class, 'edit'])->name('users.edit');

Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');




