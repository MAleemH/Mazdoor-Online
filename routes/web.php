<?php

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
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/categories', [HomeController::class, 'categories'])->name('categories')->middleware('role:admin');
Route::get('/available_jobs', [HomeController::class, 'availableJobs'])->name('available_jobs')->middleware('role:labour');
Route::get('/post_job', [HomeController::class, 'postJob'])->name('post_job')->middleware('role:employer');
