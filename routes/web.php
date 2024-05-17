<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AcceuilController;

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

Route::prefix('/')->group(function(){
    Route::get('/',[AuthController::class,'loginform']);
});

Route::prefix('admin')->group(function () {
    Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/create', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/index', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/edit/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/delete/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
});

Route::prefix('login')->group(function(){
    Route::get('/create',[AuthController::class,'create'])->name('login.create');
    Route::post('/create',[AuthController::class,'store'])->name('login.store');
    Route::get('/loginform',[AuthController::class,'loginform'])->name('login.loginform');
    Route::post('/loginform',[AuthController::class,'authentification'])->name('login.auth');
    Route::get('/index',[AuthController::class,'index'])->name('login.index');
    Route::get('/edit/{id}',[AuthController::class,'edit'])->name('login.edit');
    Route::put('/edit/{id}',[AuthController::class,'update'])->name('login.update');
    Route::delete('/delete/{id}',[AuthController::class,'destroy'])->name('login.destroy');
    Route::get('/deconnexion',[AuthController::class,'logout'])->name('login.logout');
    
});

Route::prefix('dashboard')->group(function(){
    Route::get('/dashboard',[AcceuilController::class,'acceuil'])->name('dashboard');
    Route::post('/dashboard',[AcceuilController::class,'store'])->name('dashboard.store');
});


