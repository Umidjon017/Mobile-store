<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\TelephoneMemoryController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductTelephoneController;
use App\Http\Controllers\Admin\CategoryTelephoneController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function() {
    
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
    
// });

Route::get('/', [PageController::class, 'welcome'])->name('welcome');

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function (){

    Route::get('/dashboard', [AdminController::class, 'dashboard'] )->name('dashboard');
    Route::prefix('/product-categories')->name('product-categories.')->group(function() {

        Route::delete('/table/forceDelete/{id}', [ProductCategoryController::class, 'forceDelete'])->name('table.forcedelete');
        Route::get('/table/restoreAll', [ProductCategoryController::class, 'restoreAll'])->name('table.restore.all');
        Route::get('/table/restore/{id}', [ProductCategoryController::class, 'restore'])->name('table.restore');
        Route::get('/table/archived', [ProductCategoryController::class, 'archived'])->name('table.archived');
        Route::resource('/table', ProductCategoryController::class);

        Route::delete('/telephones/forceDelete/{id}', [CategoryTelephoneController::class, 'forceDelete'])->name('telephone.forcedelete');
        Route::get('/telephones/restoreAll', [CategoryTelephoneController::class, 'restoreAll'])->name('telephones.restore.all');
        Route::get('/telephones/restore/{id}', [CategoryTelephoneController::class, 'restore'])->name('telephones.restore');
        Route::get('/telephones/archived', [CategoryTelephoneController::class, 'archived'])->name('telephones.archived');
        Route::resource('telephones', CategoryTelephoneController::class);
    });
    
    Route::delete('/product-telephones/forceDelete/{id}', [ProductTelephoneController::class, 'forceDelete'])->name('product-telephones.forcedelete');
    Route::get('/product-telephones/restoreAll', [ProductTelephoneController::class, 'restoreAll'])->name('product-telephones.restore.all');
    Route::get('/product-telephones/restore/{id}', [ProductTelephoneController::class, 'restore'])->name('product-telephones.restore');
    Route::get('/product-telephones/archived', [ProductTelephoneController::class, 'archived'])->name('product-telephones.archived');
    Route::resource('product-telephones', ProductTelephoneController::class);

    Route::resource('colors', ColorController::class);
    Route::resource('telephone-memories', TelephoneMemoryController::class);

});

require __DIR__.'/auth.php';