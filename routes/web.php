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

Route::get('/dev01','adminController@testDashboard');
Route::patch('/dev01_save','adminController@saveTestDashboard')->name('somalysku.store');

//somalycheck routes

Route::get('somalycheck/report/{type}','SomalyCheckController@viewReport')->name('somaly.report');

Route::get('somalycheck/pouch_check/{type}','SomalyCheckController@pouch_check')->name('pouch.form');

Route::get('somalycheck/water_activity_check/','SomalyCheckController@water_activity_check')->name('water.form');

Route::get('somalycheck/water_activity_check/{product}','SomalyCheckController@water_activity_check_product')->name('water.form_prod');

Route::get('somalycheck/scale_calibration_check','SomalyCheckController@scale_calibration_check')->name('cali.form');

Route::post('somalycheck/scale_calibration_store','SomalyCheckController@scale_calibration_store')->name('cali.store');

Route::post('somalycheck/water_activity_store','SomalyCheckController@water_activity_store')->name('water.store');

Route::post('somalycheck/mo_store','SomalyCheckController@mo_store')->name('mo.store');
Route::post('somalycheck/syrup_store','SomalyCheckController@syrup_store')->name('syrup.store');


Route::post('ajax_verify', 'SomalyCheckController@ajax_verify');
Route::get('getMos','SomalyCheckController@getMos');

Route::get('getMosLines','SomalyCheckController@getMosLines');
Route::get('getSyrupLines','SomalyCheckController@getSyrupLines');

 Route::get('/to_ax/{id}', 'IGCheckController@ftp_to_ax')->name('igcheck_ax');



Auth::routes();

Route::get('/home', 'HomeController@index', function(){
	 $this->middleware('auth:api');
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

//Inwards goods 
 Route::get('/igcheck_igs/{id}', 'IGCheckController@createIGS')->name('igcheck_igs.create');
 Route::post('/igcheck_igs/{id}', 'IGCheckController@updateIGS')->name('igcheck_igs.update');
 Route::get('/igcheck_rms/{id}', 'IGCheckController@createRMS')->name('igcheck_rms.create');
 Route::post('/igcheck_rms/{id}', 'IGCheckController@updateRMS')->name('igcheck_rms.update');

 Route::post('/igcheck_rms_final/{id}', 'IGCheckController@finaliseRMS')->name('igcheck_rms.finalise');

 Route::get('/igcheck_release/{id}', 'IGCheckController@releaseIGCheck')->name('igcheck_release');
 Route::get('/igcheck_review/{id}', 'IGCheckController@reviewIGCheck')->name('igcheck.review');

 Route::get('ajaxRequest_getBatches', 'IGCheckController@ajaxRequest_getBatches');

 Route::get('ajaxRequest_getParameters', 'adminController@getSKUParameters');
 Route::get('/getSkuFromAX', 'adminController@getSkuFromAX');


 Route::get('ajaxRequest_getSomalySkus','SomalyCheckController@getSkuAdmin');

 Route::post('ajaxRequest_removeParamLine', 'adminController@removeParam');

 Route::post('/admin_inwards_save/{id}', 'adminController@saveSpecifications')->name('admin_inwards.save');
 Route::post('setGlobalParam', 'adminController@saveGlobalParam');

 Route::get('IGCheck/createOfflinePDF','IGCheckController@offlineExportView');
 Route::get('ajaxRequest_getDataforOfflineForm', 'IGCheckController@offlineExportAJAX');

 Route::post('/IGCheck/updateSoa/{id}','IGCheckController@updateSoa')->name('igcheck_update_soa');

// Route::get('/igcheck_rms', 'IGCheckController@createRMS');

//report routes
Route::get('/reportforcheck', 'checkController@getAll');
Route::get('/reportformixing', 'mixingController@getAll');
Route::get('/reportforoven', 'ovenController@getAll');
Route::get('/reportforweighup', 'weighupController@getAll');

Route::resource('/batch', 'BatchController');
Route::resource('/checkPage', 'checkController');
Route::resource('/newCheck', 'checkController');
Route::resource('/edit', 'checkController');
Route::resource('/mixing', 'mixingController');
Route::resource('/oven', 'ovenController');
Route::resource('/weighup', 'weighupController');
Route::resource('/IGCheck','IGCheckController');
Route::resource('/adminpage','skuController');

Route::resource('/admin_inwards','adminController');
Route::resource('/somalycheck','SomalyCheckController');

//verify routes
Route::get('getSkus','skuController@returnskudetails');
Route::get('ajaxRequest', 'checkController@ajaxRequest');
Route::get('ajaxRequest_getSKUs', 'mixingController@ajaxRequest_getSKUs');

Route::post('ajaxRequest_updateStatus', 'checkController@ajaxRequest_updateStatus');
Route::post('ajaxRequest_updateStatus_mix', 'mixingController@ajaxRequest_updateStatus');
Route::post('ajaxRequest_updateStatus_oven', 'ovenController@ajaxRequest_updateStatus');
Route::post('ajaxRequest_updateStatus_weigh', 'weighupController@ajaxRequest_updateStatus');

Route::post('/ajaxRequest_removeIGLine','IGCheckController@ajaxRequest_removeIGLine');

Route::post('/ajaxRequest_savePouchSkus','adminController@updatePouchSku');

Route::post('IGCheck/Verify/{id}','IGCheckController@verify');

//csv download routes

Route::get('csvRequest', 'checkController@export_to_csv');
Route::get('csvRequest_oven', 'ovenController@export_to_csv');
Route::get('csvRequest_weighup', 'weighupController@export_to_csv');
Route::get('csvRequest_mix', 'mixingController@export_to_csv');
