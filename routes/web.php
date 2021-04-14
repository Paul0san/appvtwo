<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Order\OrderAsignedController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/panel', function () {
    switch (Auth::user()) {
        case Auth::user()->hasRole('Admin'):
            return view('panel.admin.dashboard');
            break;
        case Auth::user()->hasRole('Gerente'):
            return view('panel.admin.dashboard');
            break;
        case Auth::user()->hasRole('Driver'):
            return view('panel.operador.dashboard');
            break;

        default:
            # code...
            break;
    }
})->middleware(['auth'])->name('dashboard');

Route::get('/panel-driver', function () {
    return view('panel.operador.dashboard');
})->middleware(['auth'])->name('dashboard.driver');

require __DIR__.'/auth.php';

// Rutas para ordenes
Route::middleware(['auth'])->group(function () {
    Route::resource('ordenesA', 'App\Http\Controllers\Order\OrderAsignedController');
    Route::resource('ordenesNA', 'App\Http\Controllers\Order\OrderNAsignedController');
    Route::resource('operadores', 'App\Http\Controllers\Admin\OperatorsController');
    Route::post('import-ordersA-excel','App\Http\Controllers\Order\OrderAsignedController@importExcel')->name('ordersA.import.excel');
    Route::post('import-ordersNA-excel','App\Http\Controllers\Order\OrderNAsignedController@importExcel')->name('ordersNA.import.excel');
});


