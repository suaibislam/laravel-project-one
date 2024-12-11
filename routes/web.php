<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(ValidUser::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::controller(ProductController::class)->group(function(){
Route::get('/','indexone')->name('products.indexone');
Route::get('/index/{productid}','indextwo')->name('products.indextwo');
});

Route::middleware('auth')->group(function () {

    Route::controller(ProductController::class)->group(function(){
        // Route::get('/products','index')->name('products.index');
        Route::get('/dashboard','index')->name('products.index');
        
        Route::get('/products/create','create')->name('products.create');
        Route::post('/products','store')->name('products.store');
        Route::get('/products/{product}/edit','edit')->name('products.edit');
        Route::put('/products/{product}','update')->name('products.update');
        Route::delete('/products/{product}','destroy')->name('products.destroy');    
});

});

// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/data', [EmployeeController::class, 'getEmployees'])->name('employees.data');
