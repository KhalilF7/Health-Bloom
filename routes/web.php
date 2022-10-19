<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\AppointmentController;

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


Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/add_specialist_view', [SpecialistController::class, 'addview']);

Route::post('/upload_specialist', [SpecialistController::class, 'upload']);

Route::post('/appointment', [AppointmentController::class, 'appointment']);

Route::get('/myappointment', [AppointmentController::class, 'myappointment']);

Route::get('/cancel_appointment/{id}', [AppointmentController::class, 'cancel_appointment']);

