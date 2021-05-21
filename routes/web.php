<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppInsertController;

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

//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// for users
Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
});

//User's Application
Route::get('/application', function () {
    return view('application');
})->middleware(['auth', 'role:user'])->name('application');

//User's Status
Route::get('/status', function () {
    return view('status');
})->middleware(['auth', 'role:user'])->name('status');

//User's Profile
Route::get('/userprofile', function () {
    return view('userprofile');
})->middleware(['auth', 'role:user'])->name('userprofile');

//Admin's Profile
Route::get('/adminprofile', function () {
    return view('adminprofile');
})->middleware(['auth', 'role:admin'])->name('adminprofile');

//Admin Application Record
Route::get('/records', function () {
    return view('records');
})->middleware(['auth', 'role:admin'])->name('records');

//Admin Application Approval
Route::get('/approval', function () {
    return view('approval');
})->middleware(['auth', 'role:admin'])->name('approval');


require __DIR__.'/auth.php';

//insert data
Route::get('insert','App\Http\Controllers\AppInsertController@insert');
Route::post('create','App\Http\Controllers\AppInsertController@insert');

Route::post('/create','App\Http\Controllers\AppInsertController@create'); 