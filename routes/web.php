
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserTicketController;
use App\Http\Controllers\Backend\ConfigurationController;
use App\Http\Controllers\TicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| 'prefix'=>'admin', 
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();



// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');
 

Route::get('/admin', [AdminController::class, 'adminLoign'])->name('admin.login');
Route::post('/admin/login/post', [AdminController::class, 'adminpostLoign'])->name('admin.login.post');
Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');


Route::group(['prefix' => 'user', 'middleware'=>['auth']],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   // Route::get('/user/home', [HomeController::class, 'index'])->name('home');
    Route::resource('tickets', TicketController::class);
 
});

//
//Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware'=>['admin']],function(){
  
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::get('remove/user', [UserController::class, 'removeUser']);
    Route::get('user/active/{id}', [UserController::class, 'userActive'])->name('user.active');
    Route::get('user/inactive/{id}', [UserController::class, 'userInactive'])->name('user.inactive');

    Route::resource('usertickets', UserTicketController::class);
    Route::get('userticket/close', [UserTicketController::class, 'userticketClose']);

    Route::get('configuration', [ConfigurationController::class, 'configuration'])->name('configuration');
    Route::post('app/update', [ConfigurationController::class, 'appUpdate'])->name('app.update');
    Route::post('smtp/update', [ConfigurationController::class, 'SMTPUpdate'])->name('smtp.update');
    
});

