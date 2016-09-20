<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::group(['namespace' => 'Maintenance'], function () {
        Route::group(['namespace' => 'Customers'], function () {
            Route::get('payment_terms/autocomplete', ['as' => 'payment_terms.autocomplete', 'uses' => 'PaymentTermController@autocomplete']);
            Route::get('customers/autocomplete', ['as' => 'customers.autocomplete', 'uses' => 'CustomerController@autocomplete']);
        });
        Route::group(['namespace' => 'VendorsSuppliers'], function() {
            Route::get('vendors/autocomplete', ['as' => 'vendors.autocomplete', 'uses' => 'VendorController@autocomplete']);
        });
        Route::group(['namespace' => 'Items'], function () {
            Route::get('services/autocomplete', ['as'   => 'services.autocomplete', 'uses' => 'ServiceController@autocomplete']);
            Route::get('units/autocomplete', ['as'   => 'units.autocomplete', 'uses' => 'UnitController@autocomplete']);
            Route::get('billing_codes/autocomplete', ['as'   => 'billing_codes.autocomplete', 'uses' => 'BillingCodeController@autocomplete']);
        });
        Route::group(['namespace' => 'DivisionsDepartments'], function () {
            Route::get('divisions/autocomplete', ['as'   => 'divisions.autocomplete', 'uses' => 'DivisionController@autocomplete']);
        });
        Route::group(['namespace' => 'Drivers'], function () {
            Route::get('drivers/autocomplete', ['as'   => 'drivers.autocomplete', 'uses' => 'DriverController@autocomplete']);
            Route::get('carriers/autocomplete', ['as'   => 'carriers.autocomplete', 'uses' => 'CarrierController@autocomplete']);
        });
        Route::group(['namespace' => 'CountriesDestinations'], function () {
            Route::get('world_locations/autocomplete', [
                'as'   => 'world_locations.autocomplete', 'uses' => 'WorldLocationController@autocomplete']);
            Route::get('countries/autocomplete', ['as'   => 'countries.autocomplete', 'uses' => 'CountryController@autocomplete']);
            Route::get('states/autocomplete', ['as'   => 'states.autocomplete', 'uses' => 'StateController@autocomplete']);
            Route::get('scheduled/autocomplete', ['as'   => 'scheduled.autocomplete', 'uses' => 'ScheduleDkController@autocomplete']);
            Route::get('zip_codes/autocomplete', ['as'   => 'zip_codes.autocomplete', 'uses' => 'ZipCodeController@autocomplete']);
            Route::get('airports/autocomplete', ['as'   => 'airports.autocomplete', 'uses' => 'AirportController@autocomplete']);
            Route::get('ocean_ports/autocomplete', ['as'   => 'ocean_ports.autocomplete', 'uses' => 'OceanPortController@autocomplete']);
        });
        Route::group(['namespace' => 'ReasonsComments'], function () {
        });
        Route::group(['namespace' => 'Warehouse'], function () {
            Route::get('cargo_types/get', ['as' => 'cargo_types.get', 'uses' => 'CargoTypeController@get']);

            Route::get('warehouses/autocomplete', ['as'   => 'warehouses.autocomplete', 'uses' => 'WarehouseFacilityController@autocomplete']);
            Route::get('cargo_types/autocomplete', ['as'   => 'cargo_types.autocomplete', 'uses' => 'CargoTypeController@autocomplete']);
            Route::get('locations/autocomplete', ['as'   => 'locations.autocomplete', 'uses' => 'LocationController@autocomplete']);
            Route::get('locations_bins/autocomplete', ['as'   => 'locations_bins.autocomplete', 'uses' => 'LocationBinController@autocomplete']);
        });
        Route::group(['namespace' => 'CustomsHazardous'], function () {
            Route::get('uns_codes/autocomplete', ['as'   => 'uns_codes.autocomplete', 'uses' => 'UnsCodeController@autocomplete']);
        });
    });
});
