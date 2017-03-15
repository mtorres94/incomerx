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

Route::get('/', function () { return view('index'); });
Route::auth();

Route::group(['middleware' => ['web']], function () {
    Route::get('lang/{lang}', ['as'=> 'lang.switch', 'uses'=> 'LanguageController@switchLang']);

    Route::get('/panel', function () { $modules = Sass\Module::active(); return view('layouts.partials.panel', compact('modules')); });
    Route::get('/home', 'HomeController@index');

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::group(['prefix' => 'management', 'namespace' => 'Management'], function () {
            Route::resource('users', 'UserController');
            Route::resource('modules', 'ModuleController');
            Route::resource('menus', 'MenuController');
            Route::resource('options', 'OptionController');
        });
    });

    Route::group(['prefix' => 'maintenance', 'namespace' => 'Maintenance'], function () {
        Route::group(['prefix' => 'customers', 'namespace' => 'Customers'], function () {
            Route::resource('customer_types', 'CustomerTypeController');
            Route::resource('business_types', 'BusinessTypeController');
            Route::resource('contact_types', 'ContactTypeController');
            Route::resource('identification_types', 'IdentificationTypeController');
            Route::resource('payment_terms', 'PaymentTermController');
            Route::resource('incoterms', 'IncotermController');
            Route::resource('customers', 'CustomerController');
        });
        Route::group(['prefix' => 'vendors_suppliers', 'namespace' => 'VendorsSuppliers'], function() {
            Route::resource('vendor_types', 'VendorTypeController');
            Route::resource('vendors', 'VendorController');
            Route::resource('suppliers', 'SupplierController');
            Route::resource('carriers', 'CarrierController');
        });
        Route::group(['prefix' => 'items', 'namespace' => 'Items'], function () {
            Route::resource('item_categories', 'ItemCategoryController');
            Route::resource('item_subcategories', 'ItemSubcategoryController');
            Route::resource('units', 'UnitController');
            Route::resource('commodities', 'CommodityController');
            Route::resource('items', 'ItemController');
            Route::resource('services', 'ServiceController');
        });
        Route::group(['prefix' => 'divisions_departments', 'namespace' => 'DivisionsDepartments'], function () {
            Route::resource('divisions', 'DivisionController');
            Route::resource('departments', 'DepartmentController');
            Route::resource('subdepartments', 'SubdepartmentController');
        });
        Route::group(['prefix' => 'countries_destinations', 'namespace' => 'CountriesDestinations'], function () {
            Route::resource('countries', 'CountryController');
            Route::resource('cities', 'CityController');
            Route::resource('states', 'StateController');
            Route::resource('schedule_dks', 'ScheduleDkController');
            Route::resource('world_locations', 'WorldLocationController');
            Route::resource('currencies', 'CurrencyController');
            Route::resource('airports', 'AirportController');
        });
        Route::group(['prefix' => 'reasons_comments', 'namespace' => 'ReasonsComments'], function () {
            Route::resource('reasons', 'ReasonController');
            Route::resource('adjustments', 'AdjustmentController');
            Route::resource('comments', 'CommentController');
        });
        Route::group(['prefix' => 'warehouse', 'namespace' => 'Warehouse'], function () {
            Route::resource('warehouse_facilities', 'WarehouseFacilityController');
        });
        Route::group(['prefix' => 'customs_hazardous', 'namespace' => 'CustomsHazardous'], function () {
            Route::resource('uns_codes', 'UnsCodeController');
        });
    });

    Route::group(['prefix' => 'warehouse', 'namespace' => 'Warehouse'], function () {
        Route::group(['prefix' => 'receipts', 'namespace' => 'Receipts'], function () {
            Route::resource('receipts_entries', 'ReceiptEntryController');
        });
        Route::group(['prefix' => 'pickup', 'namespace' => 'Pickup'], function () {
            Route::resource('orders_entries', 'OrderEntryController');
        });
    });

    Route::group(['prefix' => 'export', 'namespace' => 'Export'], function () {
        Route::group(['prefix' => 'oceans', 'namespace' => 'OceanExport'], function () {
            Route::resource('booking_entries', 'BookingEntryController');
            Route::resource('bill_of_lading', 'EoBillOfLadingController');
            Route::resource('shipment_entries', 'EoShipmentEntryController');
            Route::resource('cargo_loader', 'EoCargoLoaderController');
            Route::resource('step_by_step', 'EoStepByStepController');
            Route::resource('quotes', 'EoQuotesController');
        });
        Route::group(['prefix' => 'air', 'namespace' => 'Air'], function () {
            Route::resource('booking_entries', 'EaBookingEntryController');
        });
    });

    Route::group(['prefix' => 'import', 'namespace' => 'Import'], function () {
        Route::group(['prefix' => 'oceans', 'namespace' => 'Ocean'], function () {
            Route::resource('quotes', 'IoQuoteController');
            Route::resource('bill_of_lading', 'IoBillOfLadingController');
            Route::resource('routing_order', 'IoRoutingOrderController');
        });
        Route::group(['prefix' => 'air', 'namespace' => 'Air'], function () {
            Route::resource('quotes', 'IaQuoteController');
            Route::resource('bill_of_lading', 'IaBillOfLadingController');
            Route::resource('routing_order', 'IaRoutingOrderController');
        });
    });
});
