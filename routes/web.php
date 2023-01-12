<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\UpozilaController;
use App\Http\Controllers\TrainingController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');;
});

// applicant
// Route::get('applicant/create', [ApplicantController::class, 'create'])-> name('applicant.create');
// Route::post('applicantdata', [ApplicantController::class, 'store'])->name('applicantdata.store');

Route::resource("/applicant", ApplicantController::class);



Route::post('education', [EducationController::class, 'store'])->name('education.store');
Route::post('training', [TrainingController::class, 'store'])->name('training.store');


Route::get('get-districts/{id}', [ApplicantController::class, 'getDistricts']);
Route::get('get-upozilas/{id}', [ApplicantController::class, 'getUpozilas']);

Route::middleware(['auth'])->group(function () {

    
    //division
    Route::resource("/division", DivisionController::class);

    // district
    Route::resource("/district", DistrictController::class);

    // upozila
    Route::resource("/upozila", UpozilaController::class);

    
});