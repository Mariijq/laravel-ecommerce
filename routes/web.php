<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AuthorController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Frontend\AuthorHomeController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\CheckOutController;



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
Route::get('/debug-session', function () {
    dd(session()->all());
});


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';


Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/books/{book}/book-detail', [BookController::class, 'bookDetails'])
    ->name('books.book-detail');
Route::get('/category/{category}/books', [BookController::class, 'booksByCategory'])
    ->name('books.by.category');
Route::get('/autorsHome', [AuthorHomeController::class, 'index'])->name('authorsHome');
Route::get('/authors/{author}/detail', [AuthorHomeController::class, 'authorDetails'])->name('authorDetails');


    //Cart 
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{ISBN}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('qty-increment/{rowId}', [CartController::class, 'qtyIncrement'])->name('qty-increment');
Route::get('qty-decrement/{rowId}', [CartController::class, 'qtyDecrement'])->name('qty-decrement');
Route::get('remove-book/{rowId}', [CartController::class, 'removeBook'])->name('remove-book');
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('clear-cart');


Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::group(['middleware'=> ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::put('profile', [UserProfileController::class, 'updateProfile'])->name('profile.update'); // user.profile.update
    Route::post('profile', [UserProfileController::class, 'updatePassword'])->name('profile.update.password');
   //User Address
    Route::resource('address', UserAddressController::class);
    //Checkout 
    Route::get('checkout', [CheckoutController::class, 'checkout'])->name('user.checkout');
    Route::post('checkout/address', [CheckoutController::class, 'createAddress'])->name('checkout.address.create');
    
    
    });
 