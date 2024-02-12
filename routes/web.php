<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

// ROUTE COMMANDS:
//  - Todas las rutas ------------------------------> php artisan route:list === php artisan r:l
//  - Sólo las de un path concreto: php artisan ----> php artisan r:l --path=contacto
//  - Sólo rutas creadas por mi (api y web) --------> php artisan r:l --except-vendor
//  - Ahora conociendo también el middleware usado -> php artisan r:l --except-vendor -v
//  - Sólo rutas creadas por paquetes de terceros --> php artisan r:l --only-vendor

// ROUTE PRODUCTION COMMANDS 
//  - Para guardar las rutas en caché --------------> php artisan route:cache
//  - Limpiar rutas de caché -----------------------> php artisan route:clear


Route::get('/', function () {
    // return view('welcome');

    $routes = route('updates.list') . 
    ' - ' 
    . route('updates.list.id', 6) . 
    ' - ' 
    . route('updates.list.id.version', [
        'id' => 3,
        'version' => 4.6,
    ]);

    return $routes;
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

// Using Regular Expressions -> only strings
Route::get('solutions/{name}', function($name) {
    return "Hello, solution name: $name";
})->where('name', '[a-zA-Z]+');

// Without using Regular Expressions -> only strings (whereAlpha)
Route::get('supports/{name}', function($name) {
    return "Hello, support name: $name";
})->whereAlpha('name');

// Without using Regular Expressions -> string & numbers (whereAlphaNumeric)
Route::get('innovations/{name}', function($name) {
    return "Hello, innovation name: $name";
})->whereAlphaNumeric('name');

// Without using Regular Expressions -> only numbers (whereNumber)
Route::get('advices/{name}', function($name) {
    return "Hello, advice name: $name";
})->whereNumber('name');

// Route with 'id' param must be numeric --> using a pattern in RouteServiceProvider config (Regular expression globally)
Route::get('resources/{id}', function($id) {
    return "Hello, resource id: $id";
});

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

// Routes names

// Without param
Route::get('updates', function() {
    return "Hello, updates list";
})->name('updates.list');

// With 1 param
Route::get('updates/{id}', function($id) {
    return "Hello, update id: $id";
})->name('updates.list.id');

// With +1 params
Route::get('updates/{id}/{version}', function($id, $version) {
    return "Hello, update id: $id with version: $version";
})->name('updates.list.id.version');

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

// CRUD routes ( 5 routes )

// GET:
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{postId}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{postId}/edit', [PostController::class, 'edit'])->name('posts.edit');

// POST:
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// PUT:
Route::put('/posts/{postId}', [PostController::class, 'update'])->name('posts.update');

// PATCH:
// Route::patch('/posts', function() {
//     return "PATCH route from '/posts'";
// });

// DELETE:
Route::delete('/posts/{postId}', [PostController::class, 'destroy'])->name('posts.destroy');
