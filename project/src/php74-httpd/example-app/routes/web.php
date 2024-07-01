<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AddressController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;


Route::get('/', function () {
    if (auth()->id() == 1) {
      return redirect('/dashboard');
    }
    return redirect('/profile');
  // return redirect('/dashboard');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');

Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');

Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');

Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');

Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::prefix('brands')
  ->group(function () {
    // C, create
    Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/create', [BrandController::class, 'store'])->name('brand.store');

    // R, list
    Route::get('/', [BrandController::class, 'index'])->name('brands.index');
    // R, view
    Route::get('/{brand_id}', [BrandController::class, 'view']);

    // U, update
    Route::get('/edit/{brand_id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('/edit/{brand_id}', [BrandController::class, 'update'])->name('brand.update');

    // D, delete
    Route::delete('/{brand_id}', [BrandController::class, 'delete']);
  });

Route::prefix('categories')
  ->group(function () {
    // C, create
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/create', [CategoryController::class, 'store'])->name('category.store');

    // R, list
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    // R, view
    Route::get('/{category_id}', [CategoryController::class, 'view']);

    // U, update
    Route::get('/edit/{category_id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/edit/{category_id}', [CategoryController::class, 'update'])->name('category.update');

    // D, delete
    Route::delete('/{category_id}', [CategoryController::class, 'delete']);
  });

Route::prefix('addresses')
  ->group(function () {
    // C, create
    Route::get('/create', [AddressController::class, 'create'])->name('address.create');
    Route::post('/create', [AddressController::class, 'store'])->name('address.store');

    // R, list
    Route::get('/', [AddressController::class, 'index'])->name('addresses.index');
    // R, view
    Route::get('/{address_id}', [AddressController::class, 'view']);

    // U, update
    Route::get('/edit/{address_id}', [AddressController::class, 'edit'])->name('address.edit');
    Route::put('/edit/{address_id}', [AddressController::class, 'update'])->name('address.update');

    // D, delete
    Route::delete('/{address_id}', [AddressController::class, 'delete']);
  });

Route::prefix('projects')
  ->group(function () {
    // C, create
    Route::get('/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/create', [ProjectController::class, 'store'])->name('project.store');

    // R, list
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    // R, view
    Route::get('/{project_id}', [ProjectController::class, 'view']);

    // U, update
    Route::get('/edit/{project_id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/edit/{project_id}', [ProjectController::class, 'update'])->name('project.update');

    // D, delete
    Route::delete('/{project_id}', [ProjectController::class, 'delete']);
  });


Route::prefix('products')
  ->group(function () {
    // C, create
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/create', [ProductController::class, 'store'])->name('product.store');

    // R, list
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    // R, view
    Route::get('/{product_id}', [ProductController::class, 'view']);

    // U, update
    Route::get('/edit/{product_id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/edit/{product_id}', [ProductController::class, 'update'])->name('product.update');

    // D, delete
    Route::delete('/{product_id}', [ProductController::class, 'delete']);
  });


Route::prefix('orders')
  ->group(function () {
    // C, create
    Route::get('/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('/create', [OrderController::class, 'store'])->name('order.store');

    // R, list
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    // R, view
    Route::get('/{order_id}', [OrderController::class, 'view']);

    // U, update
    Route::get('/edit/{order_id}', [OrderController::class, 'edit'])->name('order.edit');
    Route::put('/edit/{order_id}', [OrderController::class, 'update'])->name('order.update');

    // D, delete
    Route::delete('/{order_id}', [OrderController::class, 'delete']);
  });


Route::prefix('items')
  ->group(function () {
    // C, create
    Route::get('/create', [ItemController::class, 'create'])->name('item.create');
    Route::post('/create', [ItemController::class, 'store'])->name('item.store');

    // R, list
    Route::get('/', [ItemController::class, 'index'])->name('items.index');
    
    // R, view
    Route::get('/{item_id}', [ItemController::class, 'view']);

    // U, update
    Route::get('/edit/{item_id}', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/edit/{item_id}', [ItemController::class, 'update'])->name('item.update');

    // D, delete
    Route::delete('/{item_id}', [ItemController::class, 'delete']);
  });


Route::prefix('users')
  ->group(function () {
    // C, create, for admin create user
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/create', [UserController::class, 'store'])->name('user.store');

    // R, list
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    // R, view
    Route::get('/{user_id}', [UserController::class, 'view'])->name('user.view');

    // U, update
    Route::get('/edit/{user_id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/edit/{user_id}', [UserController::class, 'update'])->name('user.update');

    // U, enable user
    Route::post('/edit/enable/{user_id}', [UserController::class, 'enable'])->name('user.enable');

    // U, disable user
    Route::post('/edit/disable/{user_id}', [UserController::class, 'disable'])->name('user.disable');

    // D, delete
    Route::delete('/{user_id}', [UserController::class, 'delete'])->name('user.delete');
  });


Route::prefix('user_roles')
  ->group(function () {
    // C, create
    Route::get('/create', [UserRoleController::class, 'create'])->name('user_role.create');
    Route::post('/create', [UserRoleController::class, 'store'])->name('user_role.store');

    // R, list
    Route::get('/', [UserRoleController::class, 'index'])->name('user_roles.index');
    // R, view
    Route::get('/{user_role_id}', [UserRoleController::class, 'view']);

    // U, update
    Route::get('/edit/{user_role_id}', [UserRoleController::class, 'edit'])->name('user_role.edit');
    Route::put('/edit/{user_role_id}', [UserRoleController::class, 'update'])->name('user_role.update');

    // D, delete
    Route::delete('/{user_role_id}', [UserRoleController::class, 'delete']);
  });


Route::prefix('user_groups')
  ->group(function () {
    // C, create
    Route::get('/create', [UserGroupController::class, 'create'])->name('user_group.create');
    Route::post('/create', [UserGroupController::class, 'store'])->name('user_group.store');

    // R, list
    Route::get('/', [UserGroupController::class, 'index'])->name('user_groups.index');
    // R, view
    Route::get('/{user_group_id}', [UserGroupController::class, 'view'])->name('user_group.view');

    // U, update
    Route::get('/edit/{user_group_id}', [UserGroupController::class, 'edit'])->name('user_group.edit');
    Route::put('/edit/{user_group_id}', [UserGroupController::class, 'update'])->name('user_group.update');

    // D, delete
    Route::delete('/{user_group_id}', [UserGroupController::class, 'delete'])->name('user_group.delete');
  });

Route::group(
  ['middleware' => 'auth'],
  function () {
    Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
    Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile', [UserProfileController::class, 'self_update'])->name('profile.self_update');
    Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
    Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
    Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
    Route::get('/{page}', [PageController::class, 'index'])->name('page');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
  }
);
