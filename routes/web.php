<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', MainController::class)->name('main.index');
    Route::get('/main/user/{user}', ShowController::class)->name('main.user.index');
    Route::get('/main/users', IndexUsersController::class)->name('users.index')->middleware('ProfileUpdateMiddleware');
});

Route::group(['namespace' => 'App\Http\Controllers\User', 'prefix' => 'user', 'middleware' => 'user'], function () {
    Route::get('/posts/create', CreateController::class)->name('user.posts.create');
    Route::post('/posts', StoryController::class)->name('user.posts.story');
    Route::group(['middleware' => 'PostUpdateMiddleware'], function () {
        Route::get('/posts/{post}/edit', EditController::class)->name('user.posts.edit');
        Route::get('/profile/{user}/edit', EditProfileController::class)->name('user.profile.edit');
    });

    Route::get('/profile/{user}/edit', EditProfileController::class)->name('user.profile.edit')->middleware('ProfileUpdateMiddleware');
    Route::patch('/posts/{post}', UpdateController::class)->name('user.posts.update');
    Route::patch('/profile/{user}', UpdateProfileController::class)->name('user.profile.update');
    Route::delete('/posts/{post}', DestroyController::class)->name('user.posts.destroy');
});

Route::post('/forget-password', [ForgotPasswordController::class, 'forgetPasswordPost'])->name('password.email');
Route::get('/reset-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


Auth::routes();



