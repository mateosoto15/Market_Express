<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/home', [HomeController::class, 'index']);
Route::get('/search/product', [HomeController::class, 'search']);

//Admin Routes
Route::prefix('admin')->group(function () {
	

	Route::get('/register', [RegisterController::class, 'register'])->name('users');
	Route::post('/register/create', [RegisterController::class, 'store'])->name('users');
	//
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    // markets
	Route::get('/markets', [MarketController::class, 'index'])->name('markets');
	Route::get('/markets/create/',[MarketController::class, 'create'])->name('markets');
	Route::post('/markets/create/',[MarketController::class, 'store'])->name('markets');
	Route::get('/markets/edit/{id}',[MarketController::class, 'edit'])->name('markets');
	Route::post('/markets/edit/{id}',[MarketController::class, 'update'])->name('markets');
	Route::post('/markets/delete/{id}',[MarketController::class, 'destroy'])->name('markets');
	Route::get('/markets/get_markets', [MarketController::class, 'getMarkets']);
	Route::get('/markets/get_markets_select', [MarketController::class, 'getmarkets_select']);
	Route::get('/markets/get_single_market/{market_id}', [MarketController::class, 'single_market']);


	// Permissions
	Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
	Route::get('/permissions/create/',[PermissionController::class, 'create'])->name('permissions');
	Route::post('/permissions/create/',[PermissionController::class, 'store'])->name('permissions');
	Route::get('/permissions/edit/{id}',[PermissionController::class, 'edit'])->name('permissions');
	Route::post('/permissions/edit/{id}',[PermissionController::class, 'update'])->name('permissions');
	Route::post('/permissions/delete/{id}',[PermissionController::class, 'destroy'])->name('permissions');
	Route::get('/permissions/get_permissions', [PermissionController::class, 'getPermissions']);

	// products
	Route::get('/products', [ProductController::class, 'index'])->name('products');
	Route::get('/products/create/',[ProductController::class, 'create'])->name('products');
	Route::post('/products/create/',[ProductController::class, 'store'])->name('products');
	Route::get('/products/edit/{id}',[ProductController::class, 'edit'])->name('products');
	Route::post('/products/edit/{id}',[ProductController::class, 'update'])->name('products');
	Route::post('/products/delete/{id}',[ProductController::class, 'destroy'])->name('products');
	Route::get('/products/get_products', [ProductController::class, 'getProducts']);
	Route::get('/products/get_products_select', [ProductController::class, 'get_products_select']);
	
	//users
	Route::get('/users', [UserController::class, 'index'])->name('users');
	Route::post('/users/{id}/makeAdmin', [UserController::class,'makeAdmin']);
	Route::get('users/{user_id}/assignPermissions', [UserController::class, 'assignPermissions'])->name('users');
	Route::post('users/{user_id}/assignPermissions', [UserController::class, 'storePermissions'])->name('users');
	Route::get('/users/edit/{id}', [UserController::class, 'edit']);
	Route::post('/users/edit/{id}', [RegisterController::class, 'update']);
	Route::post('/users/{permission_id}/dettach/{user_id}', [UserController::class, 'removePermission']);


	//get all users
	Route::get('/users/get_all_users', [UserController::class, 'getAll']);
	Route::get('/users/get_all_users_select', [UserController::class, 'getusers_select']);

	//return auth
	Route::get('/authUser', [UserController::class, 'getAuth']);

	
});

Route::get('/images/{filename}',function($filename){
	$path = storage_path("app/images/$filename");


	if(!\File::exists($path)) abort(404);
	$file = \File::get($path);
	$type = \File::mimeType($path);

	$response = Response::make($file,200);
	$response->header("Content-Type", $type);

	return $response;
});

Route::get('/documents/{filename}',function($filename){
	$path = storage_path("app/documents/$filename");


	if(!\File::exists($path)) abort(404);
	$file = \File::get($path);
	$type = \File::mimeType($path);

	$response = Response::make($file,200);
	$response->header("Content-Type", $type);

	return $response;
});