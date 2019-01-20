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

Route::resource('users', 'UsersController');
Route::get('/users/edit', 'UsersController@edit');

Route::resource('animalType', 'AnimalTypeController');
Route::get('/animalType', 'AnimalTypeController@index');
Route::post('/animalType/store', 'AnimalTypeController@store');
Route::post('/animalType/update', 'AnimalTypeController@update');

Route::resource('animalBreed', 'AnimalBreedController');
Route::get('/animalBreed', 'AnimalBreedController@index');
Route::post('/animalBreed/store', 'AnimalBreedController@store');
Route::post('/animalBreed/update', 'AnimalBreedController@update');

Route::resource('animal', 'AnimalController');
Route::get('/animal', 'AnimalController@index');
Route::post('/animal/store', 'AnimalController@store');
Route::post('/animal/update', 'AnimalController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {
    Route::resource('images', 'ImagesController');
});
