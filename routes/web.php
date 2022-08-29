<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductCategoryController;
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
    // Route::resource('homes', HomeController::class);
    // Route::resource('categories', SportCategoryController::class);
    // Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
    // Route::resource('news', NewsController::class);
    // Route::resource('brands', BrandController::class);
    Route::prefix('/product-categories')->name('product-categories.')->group(function() {
        Route::resource('/', ProductCategoryController::class);
        Route::resource('telephones', CategoryTelephoneController::class);
    });
    Route::resource('products', ProductController::class);
    // Route::resource('sizes', SizeController::class);
    // Route::resource('team', TeamController::class);
    // Route::resource('roles', RoleController::class);
    // Route::resource('users', UserController::class);

    // Route::prefix('/complexes')->name('complexes.')->group(function () {
    //     Route::resource('/table', SportComplexController::class);

    //     Route::prefix('/locations')->name('locations.')->group(function () {
    //         Route::get('/', [SportLocationController::class, 'index']);
    //         Route::resource('countries', CountryController::class);
    //         Route::resource('regions', RegionController::class);
    //         Route::resource('areas', AreaController::class);
    //     });
    // });

    // Route::prefix('/tickets')->name('tickets.')->group(function () {
    //     Route::resource('/table', TicketController::class);
        
    //     Route::prefix('/stadiums')->name('stadiums.')->group(function () {
    //         Route::resource('/table', StadiumController::class);
    //         Route::resource('/sections', StadiumSectionController::class);
    //     });

    //     Route::post('/storeCountry', [CountryController::class, 'store'])->name('storeCountry');
    //     Route::post('/storeRegion', [RegionController::class, 'store'])->name('storeRegion');
    //     Route::post('/storeArea', [AreaController::class, 'store'])->name('storeArea');
    // });

});

require __DIR__.'/auth.php';