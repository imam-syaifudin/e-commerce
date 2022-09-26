<?php

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MemberController;
use App\Models\Member;

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
Auth::routes();



Route::get('/', function () {
    $product = Product::paginate(12);
    return view('index',compact('product'));
});



Route::middleware('auth')->group(function () {
    //
    Route::middleware('isadmin:admin')->group(function () {
        // All ROUTE   
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        route::get('admin/profile',[HomeController::class,'profile']);
        // Kategori route
        route::get('admin/kategori/cari/',[KategoriController::class,'cari']);
        route::get('admin/kategori',[KategoriController::class,'index']);
        route::resource('admin/kategori',KategoriController::class);
        route::get('admin/kategori/create',[KategoriController::class,'create']);
        route::get('admin/kategori/hapus/{kategori}',[KategoriController::class,'destroy']);
        // Product Route
        route::get('admin/product/cari/',[ProductController::class,'cari']);
        route::get('admin/product',[ProductController::class,'index']);
        route::resource('admin/product',ProductController::class);
        route::get('admin/product/create',[ProductController::class,'create']);
        route::get('admin/product/hapus/{product}',[ProductController::class,'destroy']);
    
    });
});

route::resource('member',MemberController::class);
route::get('member/register',[MemberController::class,'create']);

route::get('kategori/{kategori}/list',[IndexController::class,'kategori']);
route::get('product/cari/',[ProductController::class,'produkCari']);
route::get('/product/{product}/show',[ProductController::class,'show']);
Route::get('/index', [IndexController::class,'index']);
route::get('/product',[IndexController::class,'product']);
route::get('/contact',[IndexController::class,'contact']);
route::get('/about',[IndexController::class,'about']);


