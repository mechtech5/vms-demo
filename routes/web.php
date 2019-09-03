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

//Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('/', 'HomeController@index')->name('home');
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
		Route::get('/vehicleExport','VehicleController@export')->name('vehicle.export');
		Route::post('/import','VehicleController@import')->name('vehicle.import');
		Route::get('/vehicleformat','VehicleController@download')->name('vehicle.download');

		//End Vehicle Controller

		//start VehiclemodelController

		Route::resource('/vehicleModel','VehiclemodelController');
		Route::get('Modeldestroy/{id}','VehiclemodelController@destroy')->name('model.destroy');
		Route::get('/modelExport','VehiclemodelController@export')->name('model.export');
		Route::post('/modelImport','VehiclemodelController@import')->name('model.import');
		Route::get('/modelformate','VehiclemodelController@download')->name('model.download');

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
		Route::get('/driverformat','DriverdetailsController@download')->name('driver.download');

		//End DriverdetailsController

		//strat filtercontroller
		
		Route::resource('/filter','filter\FilterController');
		Route::get('/filtrdelete/{id}','filter\FilterController@destroy')->name('filter.delete');
		Route::get('/filterExport','filter\FilterController@export')->name('filter.export');
		Route::post('/filterImport','filter\FilterController@import')->name('filter.import');

		//end filtercontroller

		//strat oliChangeController
		
		Route::resource('/oilchange','Oilchange\OilChangeController');
		Route::get('/oildelete/{id}','Oilchange\OilChangeController@destroy')->name('oilchange.delete');
		Route::get('/oilExport','Oilchange\OilChangeController@export')->name('oilchange.export');
		Route::post('/oilImport','Oilchange\OilChangeController@import')->name('oilchange.import');

		//end oliChangeController

		//strat oliChangeController
		
		Route::resource('/batterycharge','BatteryCharge\BatteryController');
		Route::get('/betterydelete/{id}','BatteryCharge\BatteryController@destroy')->name('batterycharge.delete');
		Route::get('/batteryExport','BatteryCharge\BatteryController@export')->name('batterycharge.export');
		Route::post('/batteryImport','BatteryCharge\BatteryController@import')->name('batterycharge.import');

		//end oliChangeController

		//strat PaintingController
		
		Route::resource('/painting','Painting\PaintingController');
		Route::get('/paintingdelete/{id}','Painting\PaintingController@destroy')->name('painting.delete');
		Route::get('/paintingExport','Painting\PaintingController@export')->name('painting.export');
		Route::post('/paintingImport','Painting\PaintingController@import')->name('painting.import');

		//end PaintingController

		//strat FueltankController  
		
		Route::resource('/fueltank','Fueltank\FueltankController');
		Route::get('/fueltankdelete/{id}','Fueltank\FueltankController@destroy')->name('fueltank.delete');
		Route::get('/fueltankExport','Fueltank\FueltankController@export')->name('fueltank.export');
		Route::post('/fueltankImport','Fueltank\FueltankController@import')->name('fueltank.import');

		//end FueltankController

		//strat KMupdateController  
		
		Route::resource('/kmupdate','KMupdateController');
		Route::get('/kmupdatedelete/{id}','KMupdateController@destroy')->name('kmupdate.delete');
		Route::get('/kmupdateExport','KMupdateController@export')->name('kmupdate.export');
		Route::post('/kmupdateImport','KMupdateController@import')->name('kmupdate.import');
		Route::get('/kmupdatedownload','KMupdateController@download')->name('kmupdate.download');

		//end KMupdateController

		//strat PUCDetailsController  
		
		Route::resource('/pucdetails','Document\PUCDetailsController');
		Route::get('/pucdetailsdelete/{id}','Document\PUCDetailsController@destroy')->name('pucdetails.delete');
		Route::get('/pucdetailsExport','Document\PUCDetailsController@export')->name('pucdetails.export');
		Route::post('/pucdetailsImport','Document\PUCDetailsController@import')->name('pucdetails.import');
		Route::get('/pucdetailsdownload','Document\PUCDetailsController@download')->name('pucdetails.download');

		//end PUCDetailsController

		//strat FitnessDetailsContrller  
		
		Route::resource('/fitness','Document\FitnessDetailsController');
		Route::get('/fitnessDetailsDelete/{id}','Document\FitnessDetailsController@destroy')->name('fitness.delete');
		Route::get('/fitnessExport','Document\FitnessDetailsController@export')->name('fitness.export');
		Route::post('/fitnessDetailsImport','Document\FitnessDetailsController@import')->name('fitness.import');
		Route::get('/fitnessDetailsdownload','Document\FitnessDetailsController@download')->name('fitness.download');

		//end FitnessDetailsContrller


		//strat FitnessDetailsContrller  
		
		Route::resource('/roadtax','Document\RoadtaxDetailsController');
		Route::get('/roadtaxDetailsDelete/{id}','Document\RoadtaxDetailsController@destroy')->name('roadtax.delete');
		Route::get('/roadtaxExport','Document\RoadtaxDetailsController@export')->name('roadtax.export');
		Route::post('/roadtaxDetailsImport','Document\RoadtaxDetailsController@import')->name('roadtax.import');
		Route::get('/roadtaxDetailsdownload','Document\RoadtaxDetailsController@download')->name('roadtax.download');

		//end FitnessDetailsContrller

		//strat FitnessDetailsContrller  
		
		Route::resource('/greentax','Document\GreentaxDetailsController');
		Route::get('/greentaxDelete/{id}','Document\GreentaxDetailsController@destroy')->name('greentax.delete');
		Route::get('/greentaxExport','Document\GreentaxDetailsController@export')->name('greentax.export');
		Route::post('/greentaxDetailsImport','Document\GreentaxDetailsController@import')->name('greentax.import');
		Route::get('/greentaxDetailsDOWNLOAD','Document\GreentaxDetailsController@download')->name('greentax.download');

		//end FitnessDetailsContrller

		//strat insuranceDetailsContrller  
		
		Route::resource('/insurance','Document\InsuranceDetailsController');
		Route::get('/insuranceDelete/{id}','Document\InsuranceDetailsController@destroy')->name('insurance.delete');
		Route::get('/insuranceExport','Document\InsuranceDetailsController@export')->name('insurance.export');
		Route::post('/insuranceDetailsImport','Document\InsuranceDetailsController@import')->name('insurance.import');
		Route::get('/insuranceDetailsDownload','Document\InsuranceDetailsController@download')->name('insurance.download');

		//end insuranceDetailsContrller

		//strat StatePermitContrller  
		
		Route::resource('/statepermit','Document\StatePermitController');
		Route::get('/statepermitDelete/{id}','Document\StatePermitController@destroy')->name('statepermit.delete');
		Route::get('/statepermitExport','Document\StatePermitController@export')->name('statepermit.export');
		Route::post('/statepermitDetailsImport','Document\StatePermitController@import')->name('statepermit.import');
		Route::get('/statepermitDetailsDOwnload','Document\StatePermitController@download')->name('statepermit.download');

		//end StatePermitContrller

		//strat TempPermitContrller  
		
		Route::resource('/temppermit','Document\TempPermitController');
		Route::get('/temppermitDelete/{id}','Document\TempPermitController@destroy')->name('temppermit.delete');
		Route::get('/temppermitExport','Document\TempPermitController@export')->name('temppermit.export');
		Route::post('/temppermitImport','Document\TempPermitController@import')->name('temppermit.import');
		Route::get('/temppermitDOWnload','Document\TempPermitController@download')->name('temppermit.download');

		//end TempPermitContrller

		//strat AgentContrller  
		
		Route::resource('/agent','AgentController');
		Route::get('/agentDelete/{id}','AgentController@destroy')->name('agent.delete');
		
		//end AgentContrller

		//strat AgentContrller  
		
		Route::resource('/company','InsuranceCompanyController');
		Route::get('/companyDelete/{id}','InsuranceCompanyController@destroy')->name('company.delete');
		
		//end AgentContrller


		//Start PetrolPumpContrller
		Route::resource('/petrolpump','Fuel\PetrolPumpController');
		Route::get('/petrolpumpDelete/{id}','Fuel\PetrolPumpController@destroy')->name('petrolpump.delete');
		Route::get('/petrolpumpExport','Fuel\PetrolPumpController@export')->name('petrolpump.export');
		Route::post('/petrolpumpImport','Fuel\PetrolPumpController@import')->name('petrolpump.import');
		Route::get('/petrolpumpDOWnloAd','Fuel\PetrolPumpController@download')->name('petrolpump.download');
		Route::post('/get_city','Fuel\PetrolPumpController@get_city')->name('petrolpump.get_city');

		//End PetrolPumpContrller

		//Statr FuelEnrtyController
		Route::resource('/fuelentry','Fuel\FuelEntryController');
		Route::get('/fuelentryDelete/{id}','Fuel\FuelEntryController@destroy')->name('fuelentry.delete');
		Route::get('/fuelentryExport','Fuel\FuelEntryController@export')->name('fuelentry.export');
		Route::post('/fuelentryImport','Fuel\FuelEntryController@import')->name('fuelentry.import');
		Route::get('/fuelentryDOwnloaD','Fuel\FuelEntryController@download')->name('fuelentry.download');
		//End FuelEntryController

		//Statr FuelBillController
		Route::resource('/fuelbill','Fuel\FuelBillController');
		Route::get('/fuelbillDelete/{id}','Fuel\FuelBillController@destroy')->name('fuelbill.delete');
		Route::get('/fuelbillExport','Fuel\FuelBillController@export')->name('fuelbill.export');
		Route::post('/fuelbillImport','Fuel\FuelBillController@import')->name('fuelbill.import');
		Route::get('/fuelbillDOwnLoaD','Fuel\FuelBillController@download')->name('fuelbill.download');
		//End FuelBillController
});