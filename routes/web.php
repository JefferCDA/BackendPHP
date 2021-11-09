<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VirtualLicensesController;

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
    return view('auth.login');
});

// Route::get('/virtual_licenses', function () {
//     return view('virtual_licenses.index');
// });

// Route::get('virtual_licenses/create', [VirtualLicensesController::class, 'create']);

Route::resource('virtual_licenses', VirtualLicensesController::class)->middleware('auth');

Auth::routes(['register'=> false, 'reset' =>false]);

Route::get('/home', [VirtualLicensesController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function (){
    Route::get('/', [VirtualLicensesController::class, 'index'])->name('home');
});
