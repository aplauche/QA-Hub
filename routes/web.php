<?php

use App\Http\Controllers\CheckController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Models\Website;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pending', function () {
    return view('pending');
})->name('pending');

Route::get('/dashboard', function () {

    $websites = Website::all();

    return view('dashboard', ["websites" => $websites]);
})->middleware(['auth', 'verified', 'isAdmin'])->name('dashboard');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('/websites', WebsiteController::class)->except(["index"]);
    Route::resource('websites/{website}/issues', IssueController::class)->except(["show"]);
    Route::resource('websites/{website}/checks', CheckController::class)->only(["store", "destroy"]);
});

require __DIR__ . '/auth.php';
