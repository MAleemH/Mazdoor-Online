<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkCategoryController;
use App\Http\Controllers\ProfileController;
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
// Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
// Route::get('/categories', [HomeController::class, 'categories'])->name('categories')->middleware('role:admin');
Route::get('/available_jobs', [HomeController::class, 'availableJobs'])->name('available_jobs')->middleware('role:labour');
Route::get('/post_job', [HomeController::class, 'postJob'])->name('post_job')->middleware('role:employer');
// work category
Route::get('/work_categories', [WorkCategoryController::class, 'index'])->name('work_categories.index');
Route::get('/work_categories/create', [WorkCategoryController::class, 'create'])->name('work_categories.create');
Route::post('/work_categories', [WorkCategoryController::class, 'store'])->name('work_categories.store');
// profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.profile');
// approve or reject user account
Route::get('/pending_accounts', [HomeController::class, 'homeAdmin'])->name('pending_accounts');
Route::post('/admin/approve-reject/{userId}/{action}', [HomeController::class, 'approveReject'])->name('admin.approveReject');
// employer category
Route::get('/employer-category', [HomeController::class, 'viewCategory'])->name('viewCategory');
Route::post('/update-category', [HomeController::class, 'updateCategory'])->name('updateCategory');
