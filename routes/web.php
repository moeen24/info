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

Route::get('/', [App\Http\Controllers\Frontend\InfoController::class, 'index'])->name('info');
// submission
Route::post('/info.submit', [App\Http\Controllers\Frontend\InfoController::class, 'InfoSubmit'])->name('info.submit');

Route::get('/success', [App\Http\Controllers\Frontend\SuccessController::class, 'index'])->name('success');


Route::prefix('admin')->group(function () {
	// Admin Login
	Route::get('admin-login', [App\Http\Controllers\Backend\LoginController::class, 'LoginForm'])->name('login');

	Route::post('login', [App\Http\Controllers\Backend\LoginController::class, 'login'])->name('login.submit');

	Route::post('logout', [App\Http\Controllers\Backend\LoginController::class, 'logout'])->name('logout');


	// Admin Dashboard
	Route::get('/', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('admin.dashboard');

	// Print data to txt
	Route::get('/generate-txt/{id}', [App\Http\Controllers\Backend\DataController::class, 'txt'])->name('generate.txt');

	// Prit all data to txt
	Route::get('/generate-all-txt', [App\Http\Controllers\Backend\DataController::class, 'allTxt'])->name('generate.all.txt');

	// Print to pdf
	Route::get('/generate-pdf/{id}', [App\Http\Controllers\Backend\DataController::class, 'pdf'])->name('generate.pdf');
	
	// Print all Data to Pdf 
	Route::get('/generate-all-pdf', [App\Http\Controllers\Backend\DataController::class, 'allPdf'])->name('generate.all.pdf');

	// View Data
	Route::get('/view-info/{id}', [App\Http\Controllers\Backend\DataController::class, 'ViewInfo'])->name('view.info');

	// Header Controller
	Route::resource('/header', App\Http\Controllers\Backend\HeaderController::class);



});