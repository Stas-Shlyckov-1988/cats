<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Cats;

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

Route::get('/', function (Request $request) {

    return view('welcome', [
        'cats' => Cats::all(),
        'currentCat' => $request->input('id') ? Cats::firstWhere('id', $request->input('id')) : null
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::any('/cat/create', [App\Http\Controllers\HomeController::class, 'create'])->name('cat_create');
Route::any('/cat/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('cat_update');
