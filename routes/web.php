 <?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BranchController;
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
// login route 
Route::get('/login',[AuthController::class,'loginView'])->name('login_view');
Route::post('/login',[AuthController::class,'login'])->name('login');

// create middleware for the dashboard route
Route::group(['middleware' => ['auth']], function () {
    Route::get('/',[DashboardController::class,'index'])->name('index');
    Route::get('/print/patient/{patient}/request/{request}',[DashboardController::class,'print']);
    Route::resource('nationality', NationalityController::class);
    Route::resource('identityType', IdentityTypeController::class);
    Route::resource('patient', PatientController::class,['names' => 'patient']);
    Route::resource('branches', BranchController::class,['names' => 'branches']);
    Route::resource('users', UsersController::class,['names' => 'users']);
    
    Route::get('/request/{request}', [RequestController::class,'show']);
    Route::post('/request/{patient}', [RequestController::class,'store']);
    Route::put('/request/{patient}/update', [RequestController::class,'update']);
    Route::resource('result', ResultController::class);
    Route::resource('test', TestController::class);
    
    Route::post('/test/{test}/selected', [TestController::class,'selected']);
    Route::post('/test/{test}/unique', [TestController::class,'unique']);
    
    Route::get('/unique',[DashboardController::class,'unique'])->name('unique');;
    Route::post('/unique',[DashboardController::class,'unique_store']);
    Route::get('/remove',[DashboardController::class,'showRemovePage'])->name('remove');
    Route::delete('/remove',[DashboardController::class,'remove']);
});

// Route::post('/remove',[DashboardController::class,'unique_store']);
// Route::get('test', function () {
//     return view("new.patient.index");
// });
