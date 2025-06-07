<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssociateController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsAssociate;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'is_associate'])->group(function () {
    Route::get('/associate/dashboard', [AssociateController::class, 'index']);
});



Route::get('register/associate', [RegisterController::class, 'showAssociateForm'])->name('register.associate');
Route::post('register/associate', [RegisterController::class, 'registerAssociate'])->name('register.associate.submit');
Route::get('forgot-password', [LoginController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgot-password', [LoginController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/associate/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/associate/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/associate/services', [ServiceController::class, 'store'])->name('services.store');


// Dynamic dropdowns (AJAX location fetch)
Route::get('/get-districts/{state_id}', [LocationController::class, 'getDistricts']);
Route::get('/get-assemblies/{district_id}', [LocationController::class, 'getAssemblies']);
Route::get('/get-cities/{assembly_id}', [LocationController::class, 'getCities']);

Route::get('/', function () { return view('user.index');
})->name('home');

Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/associate', function () {
    return view('associate.index');    
});

Route::get('/dashboard', function () {
      return view('associate.index');
})->middleware(['auth', 'is_associate'])->name('associate.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/terms', function () {
    return view('terms');
})->name('terms');
Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');