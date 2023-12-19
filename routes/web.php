<?php

use Illuminate\Support\Facades\Route;

//admin
use App\Http\Controllers\AboutController;
use App\Http\Controllers\WhyController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\MetadataController;
use App\Http\Controllers\FormcontactController;
use App\Http\Controllers\DashboardController;

//home
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\TutorsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\AboutsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\MajorsController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CategoriesController;


use App\Http\Controllers\LoginController;
use Illuminate\Auth\Events\Logout;

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

//home
Route::resource('/', HomeController::class);
Route::resource('galleries', GalleriesController::class);
Route::resource('tutors', TutorsController::class);
Route::resource('events', EventsController::class);
Route::resource('abouts', AboutsController::class);
Route::resource('contacts', ContactsController::class);
Route::resource('majors', MajorsController::class);
Route::resource('blogs', BlogsController::class);
Route::resource('categories', CategoriesController::class);

//admin
Route::resource('/about', AboutController::class)->middleware('auth');
Route::resource('/why', WhyController::class)->middleware('auth');
Route::resource('/config', ConfigController::class)->middleware('auth');
Route::resource('/contact', ContactController::class)->middleware('auth');
Route::resource('/category', CategoryController::class)->middleware('auth');
Route::resource('/slider', SliderController::class)->middleware('auth');
Route::resource('/gallery', GalleryController::class)->middleware('auth');
Route::resource('/testimonial', TestimonialController::class)->middleware('auth');
Route::resource('/tutor', TutorController::class)->middleware('auth');
Route::resource('/major', MajorController::class)->middleware('auth');
Route::resource('/event', EventController::class)->middleware('auth');
Route::resource('/blog', BlogController::class)->middleware('auth');
Route::resource('/akun', AkunController::class)->middleware('auth');
Route::resource('/metadata', MetadataController::class)->middleware('auth');
Route::resource('/formcontact', FormcontactController::class)->middleware('auth');
Route::resource('dashboard', DashboardController::class)->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authentication'])->name('authentication');
Route::post('/logout', [LoginController::class, 'logout']);
