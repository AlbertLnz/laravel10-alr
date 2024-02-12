<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/contacto', function() {
//     return 'Hello World from contact page (GET)';
// });

// Route::post('/contacto', function() {
//     return 'Hello World from contact page (POST)';
// });

Route::match(['get', 'post'], '/contacto', function() {
    return 'Hello World from contact page (GET or POST)';
});
