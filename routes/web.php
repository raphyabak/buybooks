<?php

use App\Http\Livewire\Admin\Categories;
use App\Http\Livewire\Admin\Permissions;
use App\Http\Livewire\Admin\Products;
use App\Http\Livewire\Admin\Roles;
use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Home;
use App\Http\Livewire\Success;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

Route::get('/', Home::class)->name('home');
Route::get('checkout', Checkout::class)->name('checkout');
Route::get('success', Success::class)->name('success');
Route::get('/rave/callback', [App\Http\Controllers\FlutterwaveController::class, 'callback'])->name('callback');

Route::middleware(['auth'])->group(function () {
    Route::get('admin/roles', Roles::class)->name('roles');
    Route::get('admin/permissions', Permissions::class)->name('permissions');
    Route::get('admin/users', Users::class)->name('users');
    Route::get('admin/categories', Categories::class)->name('categories');
    Route::get('admin/products', Products::class)->name('products');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
