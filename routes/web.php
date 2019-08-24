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

Route::get('/', 'Auth\LoginController@showLoginForm');

// Route::get('/', 'HomeController@index')->name('home');
Auth::routes();


Route::group(['middleware' => ['role:admin']], function () {
	// This Route start For RolesController

	Route::resource('/admin', 'ACL\RolesController');
	Route::get('/delete/{id}','ACL\RolesController@destroy')->name('delete');
	Route::post('/saveChanges','ACL\RolesController@saveChanges')->name('saveChanges');

	// End RolesController

	// Start Permission Conroller 

	Route::resource('permissions', 'ACL\PermissionController');
	Route::get('/delete_permissions/{id}', 'ACL\PermissionController@destroy')->name('delete_permissions');

	// End Permission Conroller 

	// Start Users Conroller 

	Route::resource('/users', 'ACL\UserController');
	Route::get('/destroy/{id}', 'ACL\UserController@destroy')->name('destroy');
	Route::post('/changesRole','ACL\UserController@changesRole')->name('changesRole');
	Route::post('/changePermission','ACL\UserController@changePermission')->name('changePermission');

	//Start FleetController

	Route::resource('/fleet','FleetController');
	Route::get('fleetdestroy/{id}','FleetController@destroy')->name('model.destroy');

	//End FleetController
});
// End Users Conroller 

 Route::group(['middleware' => ['role:fleets']], function () {


		//Strat Dashboard Controller

		Route::resource('/dashboard','DashboardController');

		//End Dashboard Controller

		//Start State contoller

		Route::resource('/state','StateController');
		Route::get('Statedestroy/{id}','StateController@destroy')->name('state.destroy');

		//End State Controller

		//Start City Controller

		Route::resource('/city','CityController');
		Route::get('Citydestroy/{id}','CityController@destroy')->name('city.destroy');

		//End City Controller

		//Start Vehicle Controller

		Route::resource('/vehicle','VehicleController');
		Route::get('Vehicledestroy/{id}','VehicleController@destroy')->name('vehicle.destroy');

		//End Vehicle Controller

		//start VehiclemodelController

		Route::resource('/vehicleModel','VehiclemodelController');
		Route::get('Modeldestroy/{id}','VehiclemodelController@destroy')->name('model.destroy');

		//End VehiclemodelController

		//Start VehicledetailsController

		Route::resource('/vehicledetails','VehicledetailsController');
		Route::post('/vehicleget','VehicledetailsController@get_model');
		Route::get('vdetails_delete/{id}','VehicledetailsController@destroy')->name('vehicledetails.destroy');

		//End VehicledetailsController

		//Start DriverdetailsController

		Route::resource('/driver','DriverdetailsController');
		Route::get('/driverdelete/{id}','DriverdetailsController@destroy')->name('driverdelete');
		Route::post('/drivercity','DriverdetailsController@get_city');
		Route::get('/export','DriverdetailsController@export')->name('driver.export');
		Route::post('/import','DriverdetailsController@import')->name('driver.import');

		//End DriverdetailsController

});