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

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

// 1 variable
Route::get('/products/{name}', function($name) {
    return "Hello, product name: $name";
});

// 2 variables
Route::get('/services/{name}/{category}', function($name, $category) {
    return "Hello, service name: $name & category: $category";
});

// 1 variable mandatory & 1 optional
Route::get('/experiences/{name}/{price?}', function($name, $price = null) {
    if (is_numeric($price)) {
        return "Hello, experience name: $name and his price is $price €";
    } else {
        return "Hello, experience name: $name";
    }
});