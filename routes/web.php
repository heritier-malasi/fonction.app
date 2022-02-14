<?php

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\ImageHeroController;

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

Route::get('/all-staffs', function () {
    return view('pages.admin.all-staffs');
})->name('staff.index');


Route::get('/profile', function () {

    Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);
    return view('pages.profile');
})->name('profile.index');

Route::get('/add-staffs', function () {
    return view('pages.admin.add-staff');
})->name('addstaff.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::post('crop-tool', [StaffController::class, 'cropImage'])->name('crop');



Route::get('add_hero-image', [ ImageHeroController::class, 'createHomeImage' ])->name('form.index');
Route::get('hero-image', [ ImageHeroController::class, 'index' ])->name('hero.index');
Route::post('hero-image', [ ImageHeroController::class, 'storeImage' ])->name('images.store');

Route::view('/products','pages/admin/products');
Route::post('/save',[ProductController::class,'save'])->name('save.product');
Route::get('/fetchProducts',[ProductController::class,'fetchProducts'])->name('fetch.products');


Route::get('/countries-list',[CountriesController::class, 'index'])->name('countries.list');
Route::post('/add-country',[CountriesController::class,'addCountry'])->name('add.country');
Route::get('/getCountriesList',[CountriesController::class, 'getCountriesList'])->name('get.countries.list');
Route::post('/getCountryDetails',[CountriesController::class, 'getCountryDetails'])->name('get.country.details');
Route::post('/updateCountryDetails',[CountriesController::class, 'updateCountryDetails'])->name('update.country.details');
Route::post('/deleteCountry',[CountriesController::class,'deleteCountry'])->name('delete.country');
Route::post('/deleteSelectedCountries',[CountriesController::class,'deleteSelectedCountries'])->name('delete.selected.countries');




