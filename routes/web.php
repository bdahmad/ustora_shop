<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontendController::class,'index']);
Route::get('/product/details/{id}', [FrontendController::class,'details'])->name('product.details');

Route::get('/dashboard', function () {
    return view('backend.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/product/add', [AdminController::class, 'add'])->name('product.add');
    Route::get('/product/manage', [AdminController::class, 'manage'])->name('product.manage');
    Route::post('/product/save', [AdminController::class, 'save'])->name('product.save');
    Route::get('/product/delete/{id}', [AdminController::class, 'delete'])->name('product.delete');
    Route::get('/product/edit/{id}', [AdminController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [AdminController::class, 'update'])->name('product.update');
});

require __DIR__.'/auth.php';
