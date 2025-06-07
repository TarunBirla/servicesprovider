<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LocationController;

    Route::get('/associate/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/associate/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/associate/services', [ServiceController::class, 'store'])->name('services.store');


// Dynamic dropdowns (AJAX location fetch)
Route::get('/get-districts/{state_id}', [LocationController::class, 'getDistricts']);
Route::get('/get-assemblies/{district_id}', [LocationController::class, 'getAssemblies']);
Route::get('/get-cities/{assembly_id}', [LocationController::class, 'getCities']);

Route::get('/', function () {
    return view('user.index');
    
        
});

Route::get('/admin', function () {
    return view('admin.index');
    
        
});
Route::get('/associate', function () {
    return view('associate.index');
    
        
});
