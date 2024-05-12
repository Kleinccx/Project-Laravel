<?php
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;


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

Route::get('/',[ProductController::class, 'index']);
Route::get('/product-details/{id}',[ProductController::class, 'productDetails']);

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/add-product',[ProductController::class, 'addProduct']);
Route::post('/add-product', [ProductController::class, 'addProductPost'])->name('add.product.post');
Route::get('/shop', [ProductController::class, 'shop'])->name('shop');


Route::get('/cart', [CartController::class, 'view'])->name('cart.view');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('addToCart');





Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login']);



Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'register']);


Route::get('/category', [ProductController::class, 'category'])->name('category');

Route::view('/about', 'about')->name('about');

