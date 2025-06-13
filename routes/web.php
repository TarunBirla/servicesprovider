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
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/user/create', [AdminController::class, 'showUserForm'])->name('admin.user.create');
    Route::post('/admin/user', [AdminController::class, 'registerUser'])->name('admin.user.store');
    Route::get('/admin/user/{id}/edit', [AdminController::class, 'editUser'])->name('admin.user.edit');
    Route::get('/admin/associates', [AdminController::class, 'associates'])->name('admin.associates');
    Route::get('/admin/associate/create', [AdminController::class, 'showAssociateForm'])->name('admin.associate.create');
    Route::post('/admin/associate', [AdminController::class, 'registerAssociate'])->name('admin.associate.store');
    Route::get('/admin/associate/{id}/edit', [AdminController::class, 'editAssociate'])->name('admin.associate.edit');
    Route::put('/admin/associate/{id}', [AdminController::class, 'updateAssociate'])->name('admin.associate.update');
    Route::delete('/admin/associate/{id}', [AdminController::class, 'destroyAssociate'])->name('admin.associate.destroy');
    Route::get('/admin/plans', [AdminController::class, 'plans'])->name('admin.plans');
    Route::get('/admin/plan/create', [AdminController::class, 'createPlan'])->name('admin.plan.create');
    Route::post('/admin/plan', [AdminController::class, 'storePlan'])->name('admin.plan.store');
    Route::get('/admin/plan/{id}/edit', [AdminController::class, 'editPlan'])->name('admin.plan.edit');
    Route::put('/admin/plan/{id}', [AdminController::class, 'updatePlan'])->name('admin.plan.update');
    Route::delete('/admin/plan/{id}', [AdminController::class, 'destroyPlan'])->name('admin.plan.destroy');
    Route::get('/admin/locations', [AdminController::class, 'locations'])->name('admin.locations');
    Route::get('/admin/locations/create', [AdminController::class, 'createLocation'])->name('admin.locations.create');
    Route::post('/admin/locations', [AdminController::class, 'storeLocation'])->name('admin.locations.store');
    Route::get('/admin/locations/{id}/edit', [AdminController::class, 'editLocation'])->name('admin.locations.edit');
    Route::put('/admin/locations/{id}', [AdminController::class, 'updateLocation'])->name('admin.locations.update');
    Route::delete('/admin/locations/{id}', [AdminController::class, 'destroyLocation'])->name('admin.locations.destroy');
});

Route::middleware(['auth', 'is_associate'])->group(function () {
    Route::get('/associate/dashboard', [AssociateController::class, 'index'])->name('associate.dashboard');
    Route::get('/associate/services', [ServiceController::class, 'index'])->name('services.index');
<<<<<<< HEAD
});
    Route::post('/associate/services', [ServiceController::class, 'store'])->name('services.store');

    Route::get('/associate/services/create', [ServiceController::class, 'create'])->name('services.create');
=======
    Route::get('/associate/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/associate/services', [ServiceController::class, 'store'])->name('services.store');
});
>>>>>>> 984eb22d97fcb297de473ab875d6ad398207b625

Route::get('register/associate', [RegisterController::class, 'showAssociateForm'])->name('register.associate');
Route::post('register/associate', [RegisterController::class, 'registerAssociate'])->name('register.associate.submit');
Route::get('forgot-password', [LoginController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgot-password', [LoginController::class, 'sendResetLinkEmail'])->name('password.email');

// Route::get('/associate/services', [ServiceController::class, 'index'])->name('services.index');
// Route::get('/associate/services/create', [ServiceController::class, 'create'])->name('services.create');
// Route::post('/associate/services', [ServiceController::class, 'store'])->name('services.store');


// Dynamic dropdowns (AJAX location fetch)
Route::get('/get-districts/{state_id}', [LocationController::class, 'getDistricts']);
Route::get('/get-assemblies/{district_id}', [LocationController::class, 'getAssemblies']);
Route::get('/get-cities/{assembly_id}', [LocationController::class, 'getCities']);

Route::get('/', function () { 
<<<<<<< HEAD
    return view('user.login');
})->name('home');
Route::get('/search', function () { 
    return view('user.search');
})->name('home');
Route::get('/searchtable', function () { 
    return view('user.searchtableview');
})->name('home');

Route::get('/afterlogin', function () { 
=======
>>>>>>> 984eb22d97fcb297de473ab875d6ad398207b625
    return view('user.index');
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
