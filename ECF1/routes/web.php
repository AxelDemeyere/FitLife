<?php

use App\Http\Controllers\CoursController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', [CoursController::class, 'index']);

Route::prefix('cours')->group(function () {
    Route::get('/', [CoursController::class, 'index'])->name('cours.index');
    Route::get('/create', [CoursController::class, 'create'])->name('cours.create');
    Route::get('/{cours}', [CoursController::class, 'show'])->name('cours.show');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
});

Route::get('/reservation/{cours}', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::delete('/reservation/{reservation}', [ReservationController::class, 'destroy'])->name('reservation.destroy');
Route::put('/reservation/{reservation}', [ReservationController::class, 'update'])->name('reservation.update');
Route::get('/reservation/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservation.edit');
Route::get('/dashboard', function () {
    $reservations = auth()->user()->reservations()
        ->with(['cours', 'creneaux'])
        ->latest()
        ->get();

    return view('dashboard', compact('reservations'));
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
