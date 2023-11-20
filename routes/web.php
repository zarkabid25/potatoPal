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

Route::get('/test', function (){
   return view('welcome');
});

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
    Route::post('/receivals', [ReceivalsController::class, 'store'])->name('store.receivals');
    Route::get('/receival/edit', [ReceivalsController::class, 'edit'])->name('edit.receivals');
    Route::post('/receival/update', [ReceivalsController::class, 'update'])->name('update.receivals');
    Route::get('/receival/delete/{id}', [ReceivalsController::class, 'delete'])->name('delete.receivals');
    Route::post('/receival/push/Unload', [ReceivalsController::class, 'Unload'])->name('unload.receivals');
    Route::post('/receival/push/TIA', [ReceivalsController::class, 'pushTIA'])->name('pushTIA.receivals');

    //unloadings
    Route::get('/unloadings', [\App\Http\Controllers\admin\UnloadingController::class, 'index'])->name('all-unloadings');
    Route::get('/unloadings/edit', [\App\Http\Controllers\admin\UnloadingController::class, 'edit'])->name('edit-unloadings');
    Route::post('/unloadings/update', [\App\Http\Controllers\admin\UnloadingController::class, 'update'])->name('update-unloadings');

    //admin options
    Route::get('/admin_options', function (){
       return view('portal.admin-options.admin-options');
    })->name('admin-options');

    //resource
    Route::resources([
       'seedClass' => \App\Http\Controllers\admin\SeedClassController::class,
       'deliveryType' => \App\Http\Controllers\admin\DeliveryTypeController::class,
       'fungicide' => \App\Http\Controllers\admin\FungicideController::class,
       'seedGeneration' => \App\Http\Controllers\admin\SeedGenerationController::class,
       'seedType' => \App\Http\Controllers\admin\SeedTypeController::class,
       'seedVariety' => \App\Http\Controllers\admin\SeedVarietyController::class,
        'buyerGroupType' => \App\Http\Controllers\admin\BuyerGroupTypeController::class,
        'growerGroupType' => \App\Http\Controllers\admin\GrowerGroupTypeController::class,
        'paddock' => \App\Http\Controllers\admin\PaddockController::class,
        'note' => \App\Http\Controllers\admin\NotesController::class,
        'file' => \App\Http\Controllers\admin\FilesController::class,
    ]);

    //TIA Sample
    Route::get('/tia_sample', [\App\Http\Controllers\admin\TIASampleController::class, 'index'])->name('tia-sample');
    Route::post('/tia_sample', [\App\Http\Controllers\admin\TIASampleController::class, 'store'])->name('store.tia_sample');
    Route::get('/tia_add_modal', [\App\Http\Controllers\admin\TIASampleController::class, 'tiaAddModal'])->name('tia-add-modal');
});
