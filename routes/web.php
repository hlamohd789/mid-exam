<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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




Route::get('create_order', function () {
    $action = 0;
    return view('create_order',compact('action'));
});

Route::get('/', function () {
    return view('dashboard');
});

Route::put('insret', [OrderController::class,'store']);
Route::get('all_orders', [OrderController::class,'show']);
Route::delete('delete/{id}', [OrderController::class,'destroy']);
Route::get('edit/{id}', [OrderController::class,'edit']);
Route::put('update/{id}', [OrderController::class,'update']);