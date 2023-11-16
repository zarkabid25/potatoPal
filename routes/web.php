<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ReceivalsController;
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
    return redirect('/login');
})->name('logIn');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/aprroval', [AdminController::class, 'approval']);

Route::group(['middleware' => 'auth'], function (){

    //users tab
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('all-users');
    Route::post('/resgister_user', [AdminController::class, 'registerUser'])->name('user-register');
    Route::get('edit_user', [AdminController::class, 'editUser'])->name('user-edit');
    Route::post('/update_user', [AdminController::class, 'updateUser'])->name('update-user');
    Route::get('/delete_user/{id}', [AdminController::class, 'deleteUser'])->name('delete-user');

    //receivals
    Route::get('/receivals', [ReceivalsController::class, 'index'])->name('all-receivals');
});
