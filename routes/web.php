<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;

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

require __DIR__ . '/auth.php';


Route::controller(ProductController::class)->group(function () {
    Route::get('/', 'indexone')->name('products.indexone');
    Route::get('/index/{productid}', 'indextwo')->name('products.indextwo');
});

Route::middleware('auth')->group(function () {

    Route::controller(ProductController::class)->group(function () {
        // Route::get('/products','index')->name('products.index');
        Route::get('/dashboard', 'index')->name('products.index');

        Route::get('/products/create', 'create')->name('products.create');
        Route::post('/products', 'store')->name('products.store');
        Route::get('/products/{product}/edit', 'edit')->name('products.edit');
        Route::put('/products/{product}', 'update')->name('products.update');
        Route::delete('/products/{product}', 'destroy')->name('products.destroy');
    });
});

// Route::get('/admin/orders', [OrderController::class, 'adminOrderList'])->middleware('auth');



// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/data', [EmployeeController::class, 'getEmployees'])->name('employees.data');

//cart part
Route::post('/add-to-cart', [CartController::class, 'addToCart']);
Route::post('/update-cart', [CartController::class, 'updateCart']);
Route::post('/remove-from-cart', [CartController::class, 'removeFromCart']);
// Route::post('/submit-cart', [CartController::class, 'submitCart']);


//checkout
Route::post('/checkout', [CheckoutController::class, 'processCheckout']);
Route::get('/payment/{orderId}', [CheckoutController::class, 'paymentPage']);


Route::get('/process-payment/{orderId}', [CheckoutController::class, 'processPayment'])->name('process-payment');






Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payment-success', [PaymentController::class, 'success'])->name('payments.success');


