<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\admin\Auth\RegisteredController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('guest:admin')->group(function () {
  Route::get('register', [RegisteredController::class, 'create'])->name('admin.register');
  Route::post('register', [RegisteredController::class, 'store']);

  Route::get('login', [LoginController::class, 'create'])->name('admin.login');
  Route::post('login', [LoginController::class, 'store']);
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {

  Route::get('/dashboard', function () {
    return view('admin.dashboard');
  })->name('admin.dashboard');
  Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');
});
