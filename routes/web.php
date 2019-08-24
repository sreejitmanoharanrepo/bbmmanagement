<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//
Route::get('/Feedback', 'EbayfeedbackController@index');

///////messages links//////
Route::get('/message', 'MessageController@index')->name('message');
Route::get('/read/{id}', 'MessageController@read');


///////listing links///////
Route::get('/add_listing', 'ListingController@index')->name('add_listing');


///////cases link//////
Route::get('/cases', 'CaseController@index')->name('case');

