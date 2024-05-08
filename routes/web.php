<?php
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
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
