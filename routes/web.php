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
Route::get('/addsubject', function () {
    return view('addsubject');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('/home', 'SubjectsController@store');
Route::get('/subjects/{subject}', 'SubjectsController@show');
Route::post('/subjects/{subject}', 'SubjectsController@update');
Route::get('/subjects/pick/{subject}', 'SubjectsController@pick');
Route::get('subjects/delete/{subject}', 'SubjectsController@destroy' );
Route::get('/subject/create', 'SubjectsController@create');
Route::get('/specialty/{id}', 'SpecialtyController@show');
Route::get('/editProfile', 'ProfileController@edit');
Route::get('/profile', 'ProfileController@show');
Route::post('/profile', 'ProfileController@update');
Route::get('/subjects/editSubject/{subject}', 'SubjectsController@edit');

