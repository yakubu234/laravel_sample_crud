<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::resource('posts', CrudController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CrudController::class, 'index']);
Route::get('/create', function () {
        return view('create');
    });
Route::get('/destroy/{id}', [CrudController::class, 'destroy']);
Route::post('/store', [CrudController::class, 'store']);
Route::get('/edit_post/{id}', [CrudController::class, 'edit_post']);
Route::post('/edit/{id}', [CrudController::class, 'edit']);
Route::get('/show/{id}', [CrudController::class, 'show']);