<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::name('admin.')->prefix('admin')->middleware('auth')->group(function ()
{
    Route::resources([
        'categories' => AdminCategoriesController::class
    ]);
});
