<?php

use App\Http\Controllers\RoleController;
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
Route::get('/roles', RoleController::class .'@index')->name('posts.index');