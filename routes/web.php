<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CartController;

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Beranda
Route::get('/', function () {
    return view('home');
})->name('home');

// Produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}/buy', [ProdukController::class, 'showBuyForm'])->name('produk.buy');
Route::post('/produk/{id}/buy', [ProdukController::class, 'processPurchase'])->name('produk.purchase');
Route::get('/my-purchases', [ProdukController::class, 'myPurchases'])->middleware('auth')->name('purchase.purchases');


// Keranjang
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

// Admin only
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('produk', ProdukController::class)->except(['index', 'show']);
});
