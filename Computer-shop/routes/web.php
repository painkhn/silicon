<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/product/{product_id}', [ProductController::class, 'open_product'])->name('OpenProduct');
Route::get('/category/{category_link}', [CategoryController::class, 'open_category'])->name('OpenCategory');
Route::post('/profile', [ProfileController::class, 'edit_user'])->name('EditProfile');
Route::get('/admin', [AdminController::class, 'admin_panel'])->name('Admin')->middleware(IsAdmin::class);
Route::post('/admin/new_position', [AdminController::class, 'new_position'])->name('NewPosition')->middleware(IsAdmin::class);

require __DIR__.'/auth.php';
