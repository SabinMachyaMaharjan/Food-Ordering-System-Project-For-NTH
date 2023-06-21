<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController as MainController;
use App\Http\Controllers\Admin\DashboardController as DashboardController;
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
Route::get('/', [MainController::class,'main'])->name('main');
Route::group(['middleware'=>['admin-auth','throttle:admin'],'prefix'=>'admin'],function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});
// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
 });
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
