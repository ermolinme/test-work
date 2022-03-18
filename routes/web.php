<?php

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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/feedback', [App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store');

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'role:admin']
], function() {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::group([
        'prefix' => 'feedback'
    ], function() {
        Route::post('/', [\App\Http\Controllers\Admin\FeedbackController::class, 'store'])->name('admin.feedback.store');
        Route::put('/{feedback}', [\App\Http\Controllers\Admin\FeedbackController::class, 'update'])->name('admin.feedback.update');
        Route::delete('/{feedback}', [\App\Http\Controllers\Admin\FeedbackController::class, 'delete'])->name('admin.feedback.delete');
    });
});
