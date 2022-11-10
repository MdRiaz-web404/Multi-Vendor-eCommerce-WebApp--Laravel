<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\AddAdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CouponController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Symfony\Component\HttpFoundation\Request;


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
// FrontendController
Route::get("/", [FrontendController::class, "home"])->name('index');
Route::get("about", [FrontendController::class, "about"])->name('about');
Route::get("account", [FrontendController::class, "account"])->name('account');
Route::get("contact", [FrontendController::class, "contact"])->name('contact');
Route::get("product/details/{id}", [FrontendController::class, "product_details"])->name('product.details');
Route::get("vendor/allproducts/{id}", [FrontendController::class, "vendor_all_products"])->name('vendor.all.products');
Route::get("category/allproducts/{id}", [FrontendController::class, "category_all_products"])->name('category.all.products');
Route::get("shop", [FrontendController::class, "shop"])->name('shop');
Route::get("cart", [FrontendController::class, "cart"])->name('cart');
Route::post("cart/{id}", [FrontendController::class, "cart_delete"])->name('cart.delete');
Route::post("contact", [FrontendController::class, "contact_post"])->name('contact.post');
// Route::get("customer/account", [FrontendController::class, "customer_account"])->name('customer_account');


Auth::routes(['register'=>false]);

// HomeController
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);
Route::get('/admin/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware('AdminAndVendor');
Route::post('/photoupload', [App\Http\Controllers\HomeController::class, 'photoupload'])->name('photoupload');
Route::post('/admin/details/update', [App\Http\Controllers\HomeController::class, 'admindetails'])->name('admindetails');
// Route::get("team", [App\Http\Controllers\HomeController::class, "team"])->name('team');
// Route::post("team/insert", [App\Http\Controllers\HomeController::class, "teaminsert"])->name('team_insert');

// CustomerController
Route::post('/customer/register', [App\Http\Controllers\CustomerController::class, 'customer_register'])->name('customer');
Route::post('/customer/login', [App\Http\Controllers\CustomerController::class, 'customer_login'])->name('customer_login');

// VendorController
Route::get('vendor', [App\Http\Controllers\VendorController::class, "vendor"])->name('vendor_account');
Route::post('/vendor/register', [App\Http\Controllers\VendorController::class, 'vendor_register'])->name('vendor_register');
Route::get('/vendor/login', [App\Http\Controllers\VendorController::class, 'vendorlogin'])->name('vendorlogin');
Route::post('/vendor/login', [App\Http\Controllers\VendorController::class, 'vendor_login'])->name('vendor_login');
Route::post('/vendor/status/{id}', [App\Http\Controllers\VendorController::class, "vendor_status"])->name('vendor.status');

// ProductController
Route::resource('/product', App\Http\Controllers\ProductController::class)->Middleware('Vendor');
Route::get('/product/inventory/{product}', [App\Http\Controllers\ProductController::class,'inventory'])->name('product.inventory')->Middleware('Vendor');
Route::post('/product/inventory/{product}', [App\Http\Controllers\ProductController::class,'inventory_post'])->name('product.inventory.post');
Route::post('/inventory/delete/{id}', [App\Http\Controllers\ProductController::class,'inventory_delete'])->name('inventory.delete');
// VariationController
Route::resource('/variation', App\Http\Controllers\VariationController::class)->Middleware('Vendor');
// CouponController
Route::resource('/coupon', App\Http\Controllers\CouponController::class)->Middleware('Vendor');


Route::middleware(['AdminRoleChecker'])->group(function () {
    // CategpryController
    Route::resource('/category', App\Http\Controllers\CategoryController::class);
    // TeamController
    Route::resource('/team', App\Http\Controllers\TeamController::class);
    // ServiceController
    Route::resource('/service', App\Http\Controllers\ServiceController::class);
    // SponsorController
    Route::resource('/sponsor', App\Http\Controllers\SponsorController::class);
    // AddadminController
    Route::resource('/add/admin', App\Http\Controllers\AddadminController::class);
    // VendorController
    Route::get('/vendor/list', [App\Http\Controllers\VendorController::class, "vendor_list"])->name('vendor.list');
});

// Email Send
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
