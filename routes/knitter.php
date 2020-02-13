<?php 


Route::group(['middleware' => 'web','prefix' => 'knitter'], function () {
	
	Route::get('/dashboard','Knitter\KnitterController@index');

	Route::get('add-measurementset','Knitter\KnitterMeasurementController@add_measurements');

	Route::get('/measurements/edit/{id}','Knitter\KnitterMeasurementController@edit_measurements');

	Route::get('/measurements/delete/{id}','Knitter\KnitterMeasurementController@delete_measurements');
	Route::get('load-measurements','Knitter\KnitterMeasurementController@load_measurements');
	Route::get('measurements','Knitter\KnitterMeasurementController@get_my_measurements');
	Route::post('update-variables','Knitter\KnitterMeasurementController@update_variables');

	Route::post('update-measurements','Knitter\KnitterMeasurementController@update_measurements');

	Route::post('upload-measurement-picture','Knitter\KnitterMeasurementController@upload_measurement_picture');

	Route::post('create-measurements','Knitter\KnitterMeasurementController@create_measurements');
	Route::get('get-measurement-variables/{id}/{mp}','Knitter\KnitterMeasurementController@get_measurement_variables');

	Route::get('measurements/confirmation/{id}','Knitter\KnitterMeasurementController@measurement_confirmation');
Route::post('measurements/delete-picture','Knitter\KnitterMeasurementController@delete_picture');
Route::post('measurements/delete-only-picture','Knitter\KnitterMeasurementController@delete_only_picture');


/* Project library routes */

Route::get('project-library','Knitter\ProjectController@home');
});