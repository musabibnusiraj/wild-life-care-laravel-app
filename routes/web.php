<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\InvestigationController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('login');
});


Route::get('/login/callback', [SocialiteController::class, 'callback']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('customer', CustomerController::class);
    Route::resource('officer', OfficerController::class);
    Route::resource('institution', InstitutionController::class);

    Route::post('complaint/assign/officer', [InvestigationController::class, 'assignOfficer'])->name('complaint.assign.officer');
    Route::resource('complaint', ComplaintController::class);

    Route::get('investigation/{complaintId}/view', [InvestigationController::class, 'view'])->name('investigation.view');
    Route::resource('investigation', InvestigationController::class);
});
