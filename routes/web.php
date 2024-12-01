<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

Route::redirect('/', '/login');

/*Route::get('/', function () {
    return view('dashboard');
});*/

Route::get('/login', function () {
    return view('sign-in');
});

Route::post('/home', function() {
    return view('dashboard');
});

Route::get('/user', function () {
    return 'Hola mundo';
});

//Controladores para front de laravel
// AUTENTICACIÓN
Route::get('/auth', [AuthController::class, 'getUser']);
Route::post('/auth', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// USUARIOS
Route::post('/user', [UsersController::class, 'add']);

//RUTAS PARA PRUENAS POSTMAN ( ELIMINAR AL FINALIZAR )
Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
 
    $token = csrf_token();
 
    return "token, hola: ".$token;
});
