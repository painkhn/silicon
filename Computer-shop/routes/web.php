<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsBan;

Route::get('/', [HomeController::class, 'index'])->name('index')->middleware(IsBan::class);

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth', IsBan::class])->name('profile');

Route::get('/product/{product_id}', [ProductController::class, 'open_product'])->name('OpenProduct')->middleware(IsBan::class);
Route::get('/category/{category_link}', [CategoryController::class, 'open_category'])->name('OpenCategory')->middleware(IsBan::class);
Route::post('/profile', [ProfileController::class, 'edit_user'])->name('EditProfile')->middleware(['auth', IsBan::class]);
Route::get('/admin', [AdminController::class, 'admin_panel'])->name('Admin')->middleware(IsAdmin::class);
Route::post('/admin/new_position', [AdminController::class, 'new_position'])->name('NewPosition')->middleware(IsAdmin::class);
Route::get('/admin/ban/{user_id}', [AdminController::class, 'ban_user'])->name('BanUser')->middleware(IsAdmin::class);
Route::post('/search', [HomeController::class, 'search'])->name('Search')->middleware(IsBan::class);

require __DIR__.'/auth.php';
