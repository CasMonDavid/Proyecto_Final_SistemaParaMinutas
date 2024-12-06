<?php

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\Users_ProjectsController;

//Controladores para front de laravel
// AUTENTICACIÓN
Route::get('/auth', [AuthController::class, 'getUser']);
Route::post('/auth', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// USUARIOS
Route::resource('usuarios', UsersController::class)
    ->parameters(['usuarios' => 'user_id'])
    ->names('user');

// PROYECTOS
Route::resource('proyectos', ProjectsController::class)
    ->parameters(['proyectos' => 'project_id'])
    ->names('projects');
Route::get('/user_project/getByProject/{project}', [Users_ProjectsController::class, 'getByProject']);
Route::get('/user_project/getById/{id}', [Users_ProjectsController::class, 'show']);
Route::get('/user_project', [Users_ProjectsController::class, 'index']);