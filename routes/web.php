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
        Route::post('/table/restore', [ProductCategoryController::class, 'restore'])->name('table.restore');
        // Route::post('/table/restore-all', [ProductController::class, 'restoreAll'])->name('users.restore-all');
        Route::resource('/table', ProductCategoryController::class);

        Route::delete('/telephones/forceDelete/{id}', [CategoryTelephoneController::class, 'forceDelete'])->name('telephone.forcedelete');
        Route::resource('telephones', CategoryTelephoneController::class);
    });
    Route::resource('product-telephones', ProductTelephoneController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('telephone-memories', TelephoneMemoryController::class);

});

require __DIR__.'/auth.php';