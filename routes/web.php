<?php

use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ServiceController;
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

Route::get('/',[HomeController::class,'index']);
Route::post('/submit',[HomeController::class,'index']);
Route::view('about', 'web.about')->name('about');
Route::view('partners', 'web.partners')->name('pertners');
Route::view('detailspage', 'web.details');
Route::view('contact', 'web.contact')->name('contact');

// service
Route::match(['get', 'post'], 'servicepage/{cat_id?}',[ServiceController::class,'index']);
// Route::get('servicebycategory/{id?}', [ServiceController::class,'getServiceByCategory']);


// contact from
Route::post('/submit/contact/form', [ContactController::class,'submit']);



require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
