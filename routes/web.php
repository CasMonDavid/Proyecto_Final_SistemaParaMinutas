<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Http\Request;

// UTILICEN EL COMANDO: php artisan r:l
// ESTO LES PERMITIRA VER LAS RUTAS EN SU TOTALIDAD

Route::redirect('/', '/login');

/*Route::get('/', function () {
    return view('dashboard');
});*/

Route::get('/login', function () {
    return view('sign-in');
});

Route::get('/register', function () {
    return view('sign-up');
});

Route::post('/home.post', function() {
    return view('dashboard');
});

Route::redirect('/home.post', '/home');

Route::get('/home', function() {
    return view('dashboard');
});

Route::get('/users/edit-users', function() {
    return view('editusers');
});

Route::get('/project/minuta', function() {
    return view('minuta');
});

Route::get('/project/create-minuta', function() {
    return view('createminuta');
});

Route::get('/project', function() {
    return view('project');
});

Route::get('/addproject', function() {
    return view('addproject');
});

Route::get('/profile', function() {
    return view('profile');
});

Route::get('/users', function() {
    return view('users');
});

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

//RUTAS PARA PRUENAS POSTMAN ( ELIMINAR AL FINALIZAR )
Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
    $token = csrf_token();
    return "token: ".$token;
});
