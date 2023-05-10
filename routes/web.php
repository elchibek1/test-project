<?php

use App\Http\Controllers\User\RecordsCategorySumController;
use App\Http\Controllers\User\RecordsController;
use App\Http\Controllers\User\RecordsLogicController;
use App\Http\Controllers\User\RecordsMonthSumController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth')->group(function () {
    Route::resource('records', RecordsController::class)->except('show');
    Route::get('data', [RecordsLogicController::class, 'data'])->name('data');
    Route::get('data-category', [RecordsCategorySumController::class, 'categoryIndex'])->name('data-category');
    Route::post('data-category', [RecordsCategorySumController::class, 'categoryIndex'])->name('get-data-category');
    Route::get('data-month', [RecordsMonthSumController::class, 'monthIndex'])->name('data-month');
    Route::post('data-month', [RecordsMonthSumController::class, 'monthIndex'])->name('get-data-month');
});

Auth::routes();

Route::name('admin.')->prefix('admin')->middleware(['admin', 'auth'])->group(function ()
{
    Route::resources([
        'categories' => AdminCategoriesController::class
    ]);
});


