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

Route::resource('animalType', 'AnimalTypeController');
Route::get('/animalType', 'AnimalTypeController@index');
Route::post('/animalType/store', 'AnimalTypeController@store');
Route::post('/animalType/update', 'AnimalTypeController@store');

Route::resource('animalBreed', 'AnimalBreedController');
Route::get('/animalBreed', 'AnimalBreedController@index');
Route::post('/animalBreed/store', 'AnimalBreedController@store');
Route::post('/animalBreed/update', 'AnimalBreedController@store');

//
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {

    Route::resource('subjects', 'SubjectsController');
    Route::resource('tutors', 'TutorsController');
    Route::resource('images', 'ImagesController');
    Route::resource('samples', 'SamplesController');

});