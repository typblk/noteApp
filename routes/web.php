<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class,'index']);
Route::get('/index', [HomeController::class,'index']);

Route::get('/categories/{id}', [NoteController::class, 'indexByCategory']);
Route::get('/notes/create', [NoteController::class, 'create']);
Route::post('/notes', [NoteController::class, 'store']);
Route::get('/notes/{id}', [NoteController::class, 'edit']);
Route::resource('/notes', NoteController::class)->except(['edit']);
Route::resource('/notes', NoteController::class);

