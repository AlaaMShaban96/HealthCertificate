<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\IdentityTypeController;

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

Route::get('/',[DashboardController::class,'index']);
Route::get('/print/patient/{patient}/request/{request}',[DashboardController::class,'print']);
Route::resource('nationality', NationalityController::class);
Route::resource('identityType', IdentityTypeController::class);
Route::resource('patient', PatientController::class);
Route::get('/request/{request}', [RequestController::class,'show']);
Route::post('/request/{patient}', [RequestController::class,'store']);
Route::post('/request/{patient}/update', [RequestController::class,'update']);
Route::resource('result', ResultController::class);
Route::resource('test', TestController::class);

Route::post('/test/{test}/selected', [TestController::class,'selected']);
Route::post('/test/{test}/unique', [TestController::class,'unique']);
Route::get('/unique',[DashboardController::class,'unique']);
Route::post('/unique',[DashboardController::class,'unique_store']);
Route::get('test', function () {
    $patient=App\Models\Patient::find(10);
    return $patient->identity;
});