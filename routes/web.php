<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KamarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});



Route::prefix('admin')->group(function (){

    Route::get('/login', function(){
        return view('login');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/kamar', [KamarController::class, 'index'])->name('kamar');
    Route::get('/kamar/getdatatables', [KamarController::class, 'datatable'])->name('datatable');

    Route::post('/kamar', [KamarController::class, 'add'])->name('kamar_add');



});
