<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Profile\ProfileImageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

    // $users = DB::select("select * from users");
    // $users = DB::table('users')->value('email');
    // $users = DB::table('users')->first();

    // $newUser = DB::insert('insert into users (name, email, password) values (?, ?, ?)', ["Test", 'Test@tes.com', 'password']);

    // $uusers = DB::update('update users set name = "100" where email = ?', ['test@tes.com']); 

    // $deleteUser = DB::delete('delete from users where id = ?', [2]);
    // dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard-1', function () {
    return view('admin.dashboard');
});
Route::get('/product', [ProductController::class, "index"])->name('products.index');
Route::get('/product/create', [ProductController::class, "create"])->name('products.create');
Route::post('/product', [ProductController::class, "store"])->name('products.store');
Route::get('/product/{product}/edit', [ProductController::class, "edit"])->name('products.edit');
Route::put('/product/{product}/update', [ProductController::class, "update"])->name('products.update');
Route::delete('/product/{product}', [ProductController::class, "delete"])->name('products.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch("/profile/profile_image", [ProfileImageController::class, 'update'])->name('profile.profile_image');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
