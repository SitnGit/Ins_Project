<?php

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
//
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['guest.only'])->group(function () {
    // Only non-logged-in users can access the '/' route
//    Route::get('/', function () {
//        return redirect()->route('welcome');
//    });


    // Other routes...
});

Route::middleware(['auth'])->group(function () {
    // Routes that require authentication
    Route::get('/questions', 'App\Http\Controllers\QuizQuestion@showQuestions')->name('questions');
    Route::get('/test-results/{id}', 'App\Http\Controllers\TestResultController@show')
        ->name('testResult.show');
    Route::get('/show-profile-results', 'App\Http\Controllers\TestResultController@showProfileResults')->name('showProfileResults');
});
//
//Route::get('/questions', function () {
//    // ...
//})->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/questions', 'App\Http\Controllers\QuizQuestion@showQuestions')->name('questions');
});


//Route::get('/questions', 'App\Http\Controllers\QuizQuestion@load');

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified'
//])->group(function () {
//    Route::get('/', function () {
//        return view('welcome');
//    })->name('welcome');
//});


Route::post('/test-result', 'App\Http\Controllers\TestResultController@createTestResult')->name('createTestResult');

//Route::get('/show-test-results', 'App\Http\Controllers\TestResultController@showTestResult')->name('showTestResult');

//Route::get('/show-profile-results', 'App\Http\Controllers\TestResultController@showProfileResults')->name('showProfileResults');


