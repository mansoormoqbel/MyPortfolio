<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\ServiceAdminController;
use App\Http\Controllers\Admin\ProjectAdminController;
use App\Http\Controllers\HomeController;
use  App\Http\Middleware\IsAdmin;
/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// صفحات عامة
//Route::get('/', function(){ return view('home'); })->name('home');
Route::get('/services', [ServiceController::class,'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class,'show'])->name('services.show');
Route::get('/projects', [ProjectController::class,'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class,'show'])->name('projects.show');


// Admin group (محمي بالـ auth و is_admin)
Route::prefix('admin')->middleware(['auth',IsAdmin::class])->name('admin.')->group(function(){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/projects', [ProjectAdminController::class,'index'])->name('projects');
    

    // Resource routes لإدارة الخدمات والمشاريع
    
    Route::resource('services', ServiceAdminController::class, ['as' => 'admin']);
    Route::resource('projects', ProjectAdminController::class, ['as' => 'admin']);
});

require __DIR__.'/auth.php';
