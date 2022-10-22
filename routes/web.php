<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceUserController;

use App\Http\Controllers\CenterController;
use App\Http\Controllers\CategorycenterController;


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

Route::resource('/service', ServiceUserController::class);

Route::get('/serviceAdmin/archive/{id}', [ServiceController::class,'archive']);

Route::get('/serviceAdmin/active/{id}', [ServiceController::class,'active']);

Route::get('/service/like/{id}', [ServiceUserController::class,'like']);

Route::get('/service/dislike/{id}', [ServiceUserController::class,'dislike']);

Route::resource('/serviceAdmin', ServiceController::class);

Route::get('/center/serviceAdmin/{id}/create', [ServiceController::class,'create']);

// Route::get('/serviceAdmincreate/{id}', [ServiceController::class,'store']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('/categorycenter',CategorycenterController::class);
Route::resource('/center',CenterController::class);
