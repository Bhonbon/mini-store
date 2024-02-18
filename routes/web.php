<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
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
    return view('category.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('admin')->group(function () {
        //Admin Controller
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

        //Upload Controller
        Route::get('category/create', [ProductController::class, 'create']);
        Route::post('category/create', [ProductController::class, 'store']);
        Route::get('category/edit/{products}', [ProductController::class, 'edit']);
        Route::post('category/edit/{products}', [ProductController::class, 'update']);
        Route::delete('category/delete/{product}', [ProductController::class, 'destroy']);
    });
});

Route::middleware('guest')->group(function () {
});
require __DIR__ . '/auth.php';
