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

Route::get('/', function(){
    return view('layouts.app');
});

Route::get('/home', function(){
    return view('/home');
});

Route::get('/admin', function(){
    return view('/admin');
});

Route::resource('home/universities', 'Admin\UniversityController');

Route::resource('home/level', 'Admin\LevelController');

Route::resource('home/city', 'Admin\CityController');

Route::resource('home/programme', 'Admin\ProgrammeController');

Route::resource('home/package', 'Admin\PackageController');
Route::post('home/package/edit', 'Admin\PackageController@updatePackage');
Route::delete('home/package', 'Admin\PackageController@removeCourse');
Route::get('home/package/create/subcat', 'Admin\PackageController@getFaculty');
Route::get('home/package/create/subcourse', 'Admin\PackageController@getCourse');

Route::resource('home/course', 'Admin\CourseController');

Route::resource('home/countries', 'Admin\CountryController');

Route::resource('home/faculty', 'Admin\FacultyController');

Route::resource('home/admin', 'Admin\UserController');

Auth::routes();

/*Route::get('/universities', 'UniversityController@index');

Route::get('/universities/create', 'UniversityController@create');

Route::get('/universities/{id}/edit', 'UniversityController@edit');

Route::put('/universities/{id}', 'UniversityController@update');

Route::post('/universities/create', 'UniversityController@store');

Route::delete('/universities/{id}', 'UniversityController@destroy');*/

//Route::get('/index', 'HomeController@index')->name('index');



