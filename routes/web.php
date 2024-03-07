<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OraganisatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'getUsersExceptAdmin']);
    Route::get('/admin/events', [AdminController::class, 'events']);
    Route::put('/admin/confirm-event/{eventId}', [AdminController::class, 'confirmEvent'])->name('confirmEvent');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
    Route::get('/organisation/dashboard', [OraganisatorController::class, 'index']);
   Route::get('/createev', [EventController::class, 'create']);
Route::post('/events', [EventController::class,'store'])->name('events.store');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events/{eventId}/reserve', [EventController::class, 'reserve'])->name('events.reserve');
Route::get('/events/{eventId}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{eventId}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/search', [EventController::class, 'search'])->name('entreprise.search');
Route::get('/events/filter', [EventController::class, 'filterByCategory'])->name('events.filterByCategory');
Route::get('/events/{eventId}/statistics', [EventController::class, 'showReservationStatistics'])->name('events.statistics');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/block-user/{userId}', [AdminController::class, 'blockUser'])->name('blockUser');
Route::post('/unblock-user/{userId}', [AdminController::class, 'unblockUser'])->name('unblockUser');





});

require __DIR__.'/auth.php';
