<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    if(Auth::check()){
        if(Auth::user()->user_type == 'admin'){
            return redirect('admin/home');
        }
        return redirect('/home');
    }
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','as'=>'admin.', 'middleware' => 'admin'], function(){
    Route::get('home', [AdminHomeController::class, 'index'])->name('home');
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::resource('category', CategoryController::class);
});
