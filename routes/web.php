<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UpdateDatabaseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApprovalController;

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

Route::post('/application', [UpdateDatabaseController::class, 'update']);




//User's Profile
Route::get('/userprofile', function () {
    return view('userprofile');
})->middleware(['auth', 'role:user'])->name('userprofile');

//Admin's Profile
Route::get('/adminprofile', function () {
    return view('adminprofile');
})->middleware(['auth', 'role:admin'])->name('adminprofile');

//Admin Application Record
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/records', 'App\Http\Controllers\RecordsViewController@records')->name('records');
});

Route::group(['middleware' => ['auth']], function() { 
    Route::get('/rejectedrecords', 'App\Http\Controllers\RecordsViewController@rejectedrecords')->name('rejectedrecords');
});

Route::group(['middleware' => ['auth']], function() { 
    Route::get('/revokedrecords', 'App\Http\Controllers\RecordsViewController@revokedrecords')->name('revokedrecords');
});

//Records Action (Revoke)
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/recordsaction/{username}', 'App\Http\Controllers\RecordsActionController@showRecordDetails')->name('recordsaction');
});

Route::group(['middleware' => ['auth','role:admin']], function() { 
    Route::post('/revoke/{username}', 'App\Http\Controllers\RecordsActionController@revokeStatus')->name('revoke');
});

//Admin Application Approval
Route::group(['middleware' => ['auth','role:admin']], function() { 
    Route::get('/approval/{username}', 'App\Http\Controllers\ApprovalController@showApplicants')->name('approval');
});

Route::group(['middleware' => ['auth','role:admin']], function() { 
    Route::get('/rejectApplicants/{username}', 'App\Http\Controllers\ApprovalController@showApplicantsRejected')->name('rejectApplicants');
});

Route::group(['middleware' => ['auth','role:admin']], function() { 
    Route::post('/approve/{username}', 'App\Http\Controllers\ApprovalController@approveStatus')->name('approve');
});

Route::group(['middleware' => ['auth','role:admin']], function() { 
    Route::post('/reject/{username}', 'App\Http\Controllers\ApprovalController@rejectStatus')->name('reject');
});

//User's Status
Route::get('/status', function () {

    $detail = DB::table('vehregs')->get();
    return view('status', ['detail' => $detail]);
    // return view('status');
})->middleware(['auth', 'role:user'])->name('status');






require __DIR__.'/auth.php';