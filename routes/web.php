<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

/*Route::get('/', function () {
    return view('dashboard');
});*/

Route::get('/login', function () {
    return view('sign-in');
});

Route::get('/user', function () {
    return 'Hola mundo';
});
