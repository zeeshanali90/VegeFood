<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ItemControlller;


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

//signup

Route::get('signup', function () {
    return view('signup');
});
Route::get('index', function () {
    return view('index');
});
Route::get('login', function () {
    return view('login');
})->name('login');

route::post('signup',[HomeController::class,'signup'])->name('signup.auth');
route::post('login',[HomeController::class,'login'])->name('login.auth');








//category routing

Route::get('dashboard', function () {
    return view('panel/dashboard');
})->name('dashboard')->middleware('auth');


Route::get('category', [CategoriesController::class, 'index'])->name('category.index');
Route::get('category/{catId}', [CategoriesController::class, 'edit'])->name('category.edit');
Route::post('submit', [CategoriesController::class,'submit'])->name('category.create');
Route::post('category/update', [CategoriesController::class, 'update'])->name('category.update');
Route::get('list/category', [CategoriesController::class, 'list_category']);

Route::get('category/delete/{deleteId}',[CategoriesController::class,'delete'])->name('category.delete');


//products routing
Route::get('/', [ProductsController::class, 'index'])->name('index');
Route::get('products', [ProductsController::class, 'product_index'])->name('products.index');
Route::post('products', [ProductsController::class, 'submit'])->name('products.create');
Route::post('products/update', [ProductsController::class, 'update'])->name('products.update');
Route::get('list/products', [ProductsController::class, 'list_products']);
Route::get('product/{productId}', [ProductsController::class, 'edit'])->name('products.edit');
Route::get('product/delete/{delId}',[ProductsController::class,'delete'])->name('products.delete');

//slider routing
Route::get('slider', [SliderController::class, 'slider_index'])->name('slider.index');
Route::post('slider', [SliderController::class, 'submit'])->name('slider.create');
Route::post('slider/update', [SliderController::class, 'update'])->name('slider.update');
Route::get('list/slider', [SliderController::class, 'list_slider']);
Route::get('slider/{sliderId}', [SliderController::class, 'edit'])->name('slider.edit');
Route::get('slider/delete/{deleteId}',[SliderController::class,'delete'])->name('slider.delete');

//cart routing

Route::get('cart', function () {
    return view('cart');
});

Route::get('/add-to-cart/{id}',[ProductsController::class,'addToCart'])->name('addToCart');
// Route::get('/shop/{id}',[ProductsController::class,'shop'])->name('shop');
Route::post('/cart/add',[CartController::class,'addToCart'])->name('cart.add');
//cart
Route::get('list/cart', [CartController::class, 'list_cart'])->name('list.cart');
Route::get('list/cart/{cartdelId}',[CartController::class,'remove'])->name('cart.delete');

//buy product
Route::post('/buy-now', [CheckoutController::class,'buyNow'])->name('cart.buy-now');

//cheak out process
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/{id}',[CartController::class,'check'])->name('check');

//orders
Route::get('list/orders', [CheckoutController::class, 'list_orders']);
Route::get('list/detail', [ItemControlller::class, 'list_detail']);
Route::get('order/detail/{id}', [ItemControlller::class, 'oder_detail'])->name('order.detail');
Route::post('order/forward', [CheckoutController::class, 'order_forward'])->name('order.forward');
Route::post('order/reject', [CheckoutController::class, 'order_reject'])->name('order.reject');

