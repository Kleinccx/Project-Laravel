<?php
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;


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
// Login and Register Group Middleware to prevent back history
Route::group(['middleware' => 'web'], function () {
    // Add routes that need the PreventBackHistory middleware
    Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('PreventBackHistory');
    Route::post('/login', [UserController::class, 'login'])->middleware('PreventBackHistory');

    Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('PreventBackHistory');
    Route::post('/register', [UserController::class, 'register'])->middleware('PreventBackHistory');
});

// Routes that require authentication and role checks
Route::middleware(['auth'])->group(function () {
    // User routes
    Route::middleware('role:user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index'); // User dashboard
        // Add more user-specific routes here
    });

    // Admin routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard'); // Admin dashboard
        Route::get('/admin/inventory', [AdminController::class, 'inventoryControl'])->name('admin.inventory'); // Admin inventory control
        Route::get('/admin/edit-product', [AdminController::class, 'editProduct'])->name('admin.editProduct'); // Admin edit product
        Route::get('/admin/add-product', [AdminController::class, 'addProduct'])->name('admin.addProduct'); // Admin add product
        // Add more admin-specific routes here
    });

    // Profile route accessible to all authenticated users
 
});
//User to navigate to about page
   Route::get('/profile', [UserController::class, 'profile'])->name('profile');

// Route::get('/',[HomeController::class, 'index']);
Route::get('/product-details/{id}',[ProductController::class, 'productDetails']);

//Home or Index Route Default Page
Route::get('/', [HomeController::class, 'index'])->name('index');

//Add product page
Route::get('/add-product',[AdminController::class, 'addProduct']);

//process the product to be added
Route::post('/add-product', [AdminController::class, 'addProductPost'])->name('add.product.post');

//Shop Route
Route::get('/shop', [ProductController::class, 'shop'])->name('shop');

//Cart View Route
Route::get('/cart', [CartController::class, 'view'])->name('cart.view');

//Added Cart Route
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('addToCart');

//Logout user
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('PreventBackHistory');

//Logout Admin
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

//Category Route
Route::get('/category', [ProductController::class, 'category'])->name('category');

//About Route
Route::get('/about', [HomeController::class, 'about'])->name('about');

//User checkout Route
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');

//User to update product quantity Route
Route::post('/cart/updateQuantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');

//User to delete product in the cart Route
Route::post('/cart/deleteItem', [CartController::class, 'deleteItem'])->name('cart.deleteItem');

//User to update the price and quantity 
Route::post('/cart/updateQuantityAndPrice', [CartController::class, 'updateQuantityAndPrice'])->name('cart.updateQuantityAndPrice');

//User to update the price and quantity 
Route::post('/checkout', [OrderController::class, 'store']);

//User to process checkout method
Route::get('/order', [OrderController::class, 'orderDetails'])->name('orders');

//User to access the contact page

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact.store');


//Admin to access admin dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

//Admin dashboard to edit the user details
Route::post('/edit', [AdminController::class, 'edit'])->name('user.edit');

//Admin dashboard to view the user details
Route::get('/user/{id}', [AdminController::class, 'show'])->name('user.show');

//Admin dashboard to delete the user 
Route::post('/admin/delete', [AdminController::class, 'delete'])->name('admin.deleteUser');

//Admin to navigate to inventory control page
Route::get('/admin/inventory', [AdminController::class, 'Inventory'])->name('admin.inventory');

Route::get('/admin/add-product', [AdminController::class, 'AddProduct'])->name('admin.addProduct');

Route::get('/admin/edit-product/{id}', [AdminController::class, 'editProduct'])->name('admin.editProduct');
Route::post('/admin/update-product/{id}', [AdminController::class, 'updateProduct'])->name('admin.updateProduct');


Route::delete('/admin/product/{id}', [AdminController::class, 'deleteProduct'])->name('admin.deleteProduct');






