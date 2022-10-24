<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FeedbackBackendController;
use App\Http\Controllers\CategoryFeedbackController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CategorycenterController;
use App\Http\Controllers\CenterUserController;

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


// Route::get('/feedback/{id}/edit', [FeedbackController::class, 'showRating']);

Route::resource('feedback', FeedbackController::class);

Route::resource('feedbackAdmin', FeedbackBackendController::class);

Route::resource('category', CategoryFeedbackController::class);

Route::resource('/create', FeedbackController::class);
// Route::post('store', 'CommentController@store')->name("comments.store");
Route::resource("comments", CommentController::class);

Route::resource('/categorycenter',CategorycenterController::class);
Route::resource('/center',CenterController::class);
Route::resource('/centerUser',CenterUserController::class);
