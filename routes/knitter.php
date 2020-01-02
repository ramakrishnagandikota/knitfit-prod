<?php 


Route::group(['middleware' => 'web','prefix' => 'knitter'], function () {
	
	Route::get('/dashboard','Knitter\KnitterController@index');

	Route::get('/measurements/edit/{id}','Knitter\KnitterMeasurementController@edit_measurements');

	Route::get('/measurements/delete/{id}','Knitter\KnitterMeasurementController@delete_measurements');
	Route::get('load-measurements','Knitter\KnitterMeasurementController@load_measurements');
	Route::get('measurements','Knitter\KnitterMeasurementController@get_my_measurements');
	Route::post('update-measurements','Knitter\KnitterMeasurementController@update_measurements');

	Route::post('upload-measurement-picture','Knitter\KnitterMeasurementController@upload_measurement_picture');

	Route::post('create-measurements','Knitter\KnitterMeasurementController@create_measurements');
	
});