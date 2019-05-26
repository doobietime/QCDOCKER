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

Route::get('/home', function(){
	return view('home');
});


Route::get('/checkPage', function(){
	return view('viewchecks');
});

Route::get('/newCheck/create', function(){
	return view('newcheck');
});

Route::get('/edit', function(){
	return view('edit');
});





// Route::resource('/checkPage', 'viewCheckController');
// Route::resource('/newCheck','newCheckController');

Route::resource('/checkPage', 'checkController');
Route::resource('/newCheck', 'checkController');
Route::resource('/edit', 'checkController');


