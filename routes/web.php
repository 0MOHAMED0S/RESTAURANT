<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ChefsController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\GallaryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\Yummy;
use App\Http\Controllers\welcome;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [Yummy::class, 'index'])->name('index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::put('/update/Welcome', [welcome::class, 'update'])->name('update.welcome');
    Route::get('/create/menu', [MenuController::class, 'create'])->name('create.menu');
    Route::post('/store/menu', [MenuController::class, 'store'])->name('store.menu');
    Route::get('/edit/menu/{id}', [MenuController::class, 'edit'])->name('edit.menu');
    Route::put('/update/menu/{id}', [MenuController::class, 'update'])->name('update.menu');
    Route::delete('/{id}', [MenuController::class, 'destroy'])->name('destroy.menu');
    Route::post('/store/section', [SectionController::class, 'store'])->name('store.section');
    Route::post('/active-section', [SectionController::class, 'updateActiveSection'])->name('active.section');
    Route::put('/update/Section/{id}', [SectionController::class, 'update'])->name('update.section');
    Route::delete('/destroy/section{id}', [SectionController::class, 'destroy'])->name('destroy.section');

    Route::get('/dashboard/sections', [Yummy::class, 'sections'])->name('sections');
    Route::get('/dashboard/menuietms', [Yummy::class, 'menuietms'])->name('menuietms');
    Route::get('/dashboard/welcomepage', [welcome::class, 'welcomepage'])->name('welcomepage');
    Route::get('/dashboard/chefs', [ChefsController::class, 'chefs'])->name('chefs');
    Route::post('/dashboard/chefs/create', [ChefsController::class, 'store'])->name('store.chef');
    Route::put('/dashboard/chefs/update/{id}', [ChefsController::class, 'update'])->name('update.chefs');
    Route::delete('/dashboard/chefs/destroy{id}', [ChefsController::class, 'destroy'])->name('destroy.chef');
    Route::get('/dashboard/gallary', [GallaryController::class, 'gallary'])->name('gallary');
    Route::post('/dashboard/gallary/store', [GallaryController::class, 'store'])->name('store.gallary');
    Route::delete('/dashboard/gallary/destroy{id}', [GallaryController::class, 'destroy'])->name('destroy.gallary');
    Route::get('/dashboard/contactus', [ContactusController::class, 'contactus'])->name('contactus');
    Route::put('/dashboard/contactus/update/{id}', [ContactusController::class, 'update'])->name('update.contactus');

    Route::get('/edit/AboutUs', [AboutUsController::class, 'edit'])->name('edit.aboutus');
    Route::put('/update/AboutUs', [AboutUsController::class, 'update'])->name('update.aboutus');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
