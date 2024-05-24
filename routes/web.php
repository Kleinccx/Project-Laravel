<?php
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;


use Illuminate\Support\Facades\Route;

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

Route::get('/about', [PagesController::class,'about']
);

// Route::get('/',[HomeController::class, 'index']);
Route::get('/product-details/{id}',[ProductController::class, 'productDetails']);

//Home or Index Route Default Page
Route::get('/', [HomeController::class, 'index'])->name('index');

//Add product page
Route::get('/add-product',[ProductController::class, 'addProduct']);

//process the product to be added
Route::post('/add-product', [ProductController::class, 'addProductPost'])->name('add.product.post');

//Shop Route
Route::get('/shop', [ProductController::class, 'shop'])->name('shop');

//Cart View Route
Route::get('/cart', [CartController::class, 'view'])->name('cart.view');

//Added Cart Route
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('addToCart');

//Login Route 
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login']);

//Register Route
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'register']);

//Category Route
Route::get('/category', [ProductController::class, 'category'])->name('category');

//About Route
Route::view('/about', 'about')->name('about');

//User profile Route
Route::get('/profile', [UserController::class, 'profile'])->name('profile');

//Logout user
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/cart/update-quantity', 'CartController@updateQuantity')->name('cart.update-quantity');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');





