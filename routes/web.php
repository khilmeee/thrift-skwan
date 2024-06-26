<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/product', [ProductController::class, "public_index"])->name('product.index');
    Route::get('/product/{product}', [ProductController::class, "public_show"])->name('product.show');
});

Route::group(['middleware'=>'role:admin','prefix'=>'admin', 'as'=>'admin.'],function () {
    Route::get('/', [AdminController::class,'index'])->name('index');
    Route::get('/user', [UserController::class,'index'])->name('user.index');

    // product
    Route::resource('/product', ProductController::class);
});


require __DIR__.'/auth.php';
