<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProposalController;
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
// Route::get('/available_jobs', [HomeController::class, 'availableJobs'])->name('available_jobs')->middleware('role:labour');
// Route::get('/post_job', [HomeController::class, 'postJob'])->name('post_job')->middleware('role:employer');
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
// jobs
Route::get('/jobs', [HomeController::class, 'jobs'])->name('jobs.index');
Route::get('/jobs/create', [HomeController::class, 'createJob'])->name('jobs.create');
Route::post('/jobs', [HomeController::class, 'storeJob'])->name('jobs.store');
Route::get('/jobs/{job}', [HomeController::class, 'jobDetails'])->name('jobs.show');
Route::get('/jobs/{job}/proposals', [HomeController::class, 'showProposals'])->name('jobs.proposals');
// portfolio
Route::middleware(['auth'])->group(function () {
    Route::get('/portfolios', [PortfolioController::class, 'index'])->name('portfolios.index');
    Route::get('/portfolios/create', [PortfolioController::class, 'create'])->name('portfolios.create');
    Route::post('/portfolios', [PortfolioController::class, 'store'])->name('portfolios.store');
    Route::get('/portfolios/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('portfolios.edit');
    Route::put('/portfolios/{portfolio}', [PortfolioController::class, 'update'])->name('portfolios.update');
});
// proposals
Route::get('/proposals/create/{job}', [ProposalController::class, 'create'])->name('proposals.create');
Route::post('/proposals', [ProposalController::class, 'store'])->name('proposals.store');
Route::get('/proposals', [HomeController::class, 'placedProposals'])->name('proposals.placed');
