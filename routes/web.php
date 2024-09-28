<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\ChefsController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\GallaryController;
use App\Http\Controllers\IetmController;
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

Route::get('/', [Yummy::class, 'index'])->name('index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/dashboard')->middleware('auth')->group(function () {

    //Welcome Details //
    Route::prefix('Welcome/Details')->controller(welcome::class)->group(function () {
        Route::put('/update', [welcome::class, 'update'])->name('update.welcome');
        Route::get('/', [welcome::class, 'welcomepage'])->name('welcomepage');
    });

    //Ietms //
    Route::prefix('/ietms')->controller(IetmController::class)->group(function () {
        Route::get('/',  'ietms')->name('menuietms');
        Route::post('/store', 'store')->name('store.ietm');
        Route::get('/{id}/edit',  'edit')->name('edit.ietm');
        Route::put('/{id}/update',  'update')->name('update.ietm');
        Route::delete('/{id}/destroy',  'destroy')->name('destroy.ietm');
    });

    //Sections //
    Route::prefix('/sections')->controller(SectionController::class)->group(function () {
        Route::get('/',  'sections')->name('sections');
        Route::post('/store',  'store')->name('store.section');
        Route::post('/active',  'updateActiveSection')->name('active.section');
        Route::put('/{id}/update',  'update')->name('update.section');
        Route::delete('/{id}/destroy',  'destroy')->name('destroy.section');
    });

    //Chefs //
    Route::prefix('/chefs')->controller(ChefController::class)->group(function () {
        Route::get('/', 'chefs')->name('chefs');
        Route::post('/create',  'store')->name('store.chef');
        Route::put('/{id}/update',  'update')->name('update.chef');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy.chef');
    });

    //Gallary //
    Route::prefix('/gallary')->controller(GallaryController::class)->group(function () {
        Route::get('/', 'gallary')->name('gallary');
        Route::post('/store', 'store')->name('store.gallary');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy.gallary');
    });

    //Contact Us //
    Route::prefix('/contactus')->controller(ContactusController::class)->group(function () {
        Route::get('/',  'contactus')->name('contactus');
        Route::put('/{id}/update', 'update')->name('update.contactus');
    });

    //About Us //
    Route::prefix('/aboutus')->controller(AboutUsController::class)->group(function () {
        Route::get('/',  'index')->name('edit.aboutus');
        Route::put('/update',  'update')->name('update.aboutus');
    });
});
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

require __DIR__ . '/auth.php';
