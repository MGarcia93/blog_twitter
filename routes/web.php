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

Route::get('/', 'GuestController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/entries/create', 'EntryController@create')->name('entry.create');
Route::post('/entries','EntryController@store')->name('entry.store');
Route::put('/entries/{entry}','EntryController@update')->name('entry.update');
Route::get('/entries/{entry}/edit', 'EntryController@edit')->name('entry.show');

Route::get('/entries/{entryBySlug}', 'GuestController@show')->name('guest.show');
Route::get('/users/{user}', 'UserController@show')->name('user.show');



