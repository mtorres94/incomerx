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
            Route::post('identification_type/verify_open', ['as' => 'identification_type.open', 'uses' => 'IdentificationTypeController@getOpenStatus']);
            Route::post('identification_type/update_close', ['as' => 'identification_type.close', 'uses' => 'IdentificationTypeController@updateClose']);
            Route::post('payment_term/verify_open', ['as' => 'payment_term.open', 'uses' => 'PaymentTermController@getOpenStatus']);
            Route::post('payment_term/update_close', ['as' => 'payment_term.close', 'uses' => 'PaymentTermController@updateClose']);
            Route::post('incoterm/verify_open', ['as' => 'incoterms.open', 'uses' => 'IncotermController@getOpenStatus']);
            Route::post('incoterm/update_close', ['as' => 'incoterms.close', 'uses' => 'IncotermController@updateClose']);
        });
        Route::group(['namespace' => 'VendorsSuppliers'], function () {
            Route::post('vendor_type/verify_open',  ['as' => 'vendors_type.open',  'uses' => 'VendorTypeController@getOpenStatus']);
            Route::post('vendor_type/update_close', ['as' => 'vendors_type.close', 'uses' => 'VendorTypeController@updateClose']);
        });
        Route::group(['namespace' => 'Items'], function () {
            Route::post('units/verify_open', ['as' => 'units.open', 'uses' => 'UnitController@getOpenStatus']);
            Route::post('units/update_close', ['as' => 'units.close', 'uses' => 'UnitController@updateClose']);
            Route::post('services/verify_open', ['as' => 'services.open', 'uses' => 'ServiceController@getOpenStatus']);
            Route::post('services/update_close', ['as' => 'services.close', 'uses' => 'ServiceController@updateClose']);
            Route::post('item_categories/verify_open', ['as' => 'item_categories.open', 'uses' => 'ItemCategoryController@getOpenStatus']);
            Route::post('item_categories/update_close', ['as' => 'item_categories.close', 'uses' => 'ItemCategoryController@updateClose']);
            Route::post('item_subcategories/verify_open', ['as' => 'item_subcategories.open', 'uses' => 'ItemSubcategoryController@getOpenStatus']);
            Route::post('item_subcategories/update_close', ['as' => 'item_subcategories.close', 'uses' => 'ItemSubcategoryController@updateClose']);
            Route::post('items/verify_open', ['as' => 'items.open', 'uses' => 'ItemController@getOpenStatus']);
            Route::post('items/update_close', ['as' => 'items.close', 'uses' => 'ItemController@updateClose']);
        });

        Route::group(['namespace' => 'Warehouse'], function () {
            Route::post('warehouse_facilities/verify_open',  ['as' => 'warehouse_facilities.open',  'uses' => 'WarehouseFacilityController@getOpenStatus']);
            Route::post('warehouse_facilities/update_close', ['as' => 'warehouse_facilities.close', 'uses' => 'WarehouseFacilityController@updateClose']);
        });

        Route::group(['namespace' => 'CountriesDestinations'], function () {
            Route::post('world_locations/verify_open',  ['as' => 'world_locations.open',  'uses' => 'WorldLocationController@getOpenStatus']);
            Route::post('world_locations/update_close', ['as' => 'world_locations.close', 'uses' => 'WorldLocationController@updateClose']);
            Route::post('airports/verify_open',  ['as' => 'airports.open',  'uses' => 'AirportController@getOpenStatus']);
            Route::post('airports/update_close', ['as' => 'airports.close', 'uses' => 'AirportController@updateClose']);
            Route::post('cities/verify_open',  ['as' => 'cities.open',  'uses' => 'CityController@getOpenStatus']);
            Route::post('cities/update_close', ['as' => 'cities.close', 'uses' => 'CityController@updateClose']);
            Route::post('countries/verify_open',  ['as' => 'countries.open',  'uses' => 'CountryController@getOpenStatus']);
            Route::post('countries/update_close', ['as' => 'countries.close', 'uses' => 'CountryController@updateClose']);
            Route::post('currencies/verify_open',  ['as' => 'currencies.open',  'uses' => 'CurrencyController@getOpenStatus']);
            Route::post('currencies/update_close', ['as' => 'currencies.close', 'uses' => 'CurrencyController@updateClose']);
            Route::post('states/verify_open',  ['as' => 'states.open',  'uses' => 'StateController@getOpenStatus']);
            Route::post('states/update_close', ['as' => 'states.close', 'uses' => 'StateController@updateClose']);
            Route::post('schedule_dk/verify_open',  ['as' => 'schedule_dk.open',  'uses' => 'ScheduleDkController@getOpenStatus']);
            Route::post('schedule_dk/update_close', ['as' => 'schedule_dk.close', 'uses' => 'ScheduleDkController@updateClose']);
        });
        Route::group(['namespace' => 'DivisionsDepartments'], function () {
            Route::post('divisions/verify_open',  ['as' => 'divisions.open',  'uses' => 'DivisionController@getOpenStatus']);
            Route::post('divisions/update_close', ['as' => 'divisions.close', 'uses' => 'DivisionController@updateClose']);
            Route::post('departments/verify_open',  ['as' => 'departments.open',  'uses' => 'DepartmentController@getOpenStatus']);
            Route::post('departments/update_close', ['as' => 'departments.close', 'uses' => 'DepartmentController@updateClose']);
            Route::post('subdepartments/verify_open',  ['as' => 'subdepartments.open',  'uses' => 'SubDepartmentController@getOpenStatus']);
            Route::post('subdepartments/update_close', ['as' => 'subdepartments.close', 'uses' => 'SubDepartmentController@updateClose']);
        });
    });

    Route::group(['namespace' => 'Warehouse'], function () {
        Route::group(['namespace' => 'Receipts'], function () {
            Route::post('receipts_entries/verify_open',  ['as' => 'receipts_entries.open',  'uses' => 'ReceiptEntryController@getOpenStatus']);
            Route::post('receipts_entries/update_close', ['as' => 'receipts_entries.close', 'uses' => 'ReceiptEntryController@updateClose']);
        });

        Route::group(['namespace' => 'Pickup'], function () {
            Route::post('orders_entries/verify_open',  ['as' => 'orders_entries.open',  'uses' => 'OrderEntryController@getOpenStatus']);
            Route::post('orders_entries/update_close', ['as' => 'orders_entries.close', 'uses' => 'OrderEntryController@updateClose']);
        });
    });
    Route::group(['namespace' => 'Export'], function () {
        Route::group(['namespace' => 'OceanExport'], function () {
            Route::post('eo_quotes/verify_open',  ['as' => 'eo_quotes.open',  'uses' => 'EoQuotesController@getOpenStatus']);
            Route::post('eo_quotes/update_close', ['as' => 'eo_quotes.close', 'uses' => 'EoQuotesController@updateClose']);

            Route::post('eo_shipment_entries/verify_open',  ['as' => 'eo_shipment_entries.open',  'uses' => 'EoShipmentEntryController@getOpenStatus']);
            Route::post('eo_shipment_entries/update_close', ['as' => 'eo_shipment_entries.close', 'uses' => 'EoShipmentEntryController@updateClose']);
            Route::post('cargo_loader/verify_open',  ['as' => 'cargo_loader.open',  'uses' => 'EoCargoLoaderController@getOpenStatus']);
            Route::post('cargo_loader/update_close', ['as' => 'cargo_loader.close', 'uses' => 'EoCargoLoaderController@updateClose']);
            Route::post('cargo_loader/storeHbl', ['as' => 'cargo_loader.storeHbl', 'uses' => 'EoCargoLoaderController@storeHbl']);
            Route::post('eo_bill_of_lading/verify_open',  ['as' => 'eo_bill_of_lading.open',  'uses' => 'EoBillOfLadingController@getOpenStatus']);
            Route::post('eo_bill_of_lading/update_close', ['as' => 'eo_bill_of_lading.close', 'uses' => 'EoBillOfLadingController@updateClose']);
        });

    });

    Route::group(['namespace' => 'Import'], function () {
        Route::group(['namespace' => 'Ocean'], function () {
            Route::post('io_shipment_entries/verify_open',  ['as' => 'io_shipment_entries.open',  'uses' => 'IoShipmentEntryController@getOpenStatus']);
            Route::post('io_shipment_entries/update_close', ['as' => 'io_shipment_entries.close', 'uses' => 'IoShipmentEntryController@updateClose']);
            Route::post('io_bill_of_lading/verify_open',  ['as' => 'io_bill_of_lading.open',  'uses' => 'IoBillOfLadingController@getOpenStatus']);
            Route::post('io_bill_of_lading/update_close', ['as' => 'io_bill_of_lading.close', 'uses' => 'IoBillOfLadingController@updateClose']);
            Route::post('io_routing_order/verify_open',  ['as' => 'io_routing_order.open',  'uses' => 'IoRoutingOrderController@getOpenStatus']);
            Route::post('io_routing_order/update_close', ['as' => 'io_routing_order.close', 'uses' => 'IoRoutingOrderController@updateClose']);
            Route::post('io_quotes/verify_open',  ['as' => 'io_quotes.open',  'uses' => 'IoQuoteController@getOpenStatus']);
            Route::post('io_quotes/update_close', ['as' => 'io_quotes.close', 'uses' => 'IoQuoteController@updateClose']);
        });

        Route::group(['namespace' => 'Air'], function () {
            Route::post('ia_bill_of_lading/verify_open',  ['as' => 'ia_bill_of_lading.open',  'uses' => 'IaBillOfLadingController@getOpenStatus']);
            Route::post('ia_bill_of_lading/update_close', ['as' => 'ia_bill_of_lading.close', 'uses' => 'IaBillOfLadingController@updateClose']);
            Route::post('ia_routing_order/verify_open',  ['as' => 'ia_routing_order.open',  'uses' => 'IaRoutingOrderController@getOpenStatus']);
            Route::post('ia_routing_order/update_close', ['as' => 'ia_routing_order.close', 'uses' => 'IaRoutingOrderController@updateClose']);
            Route::post('ia_quotes/verify_open',  ['as' => 'ia_quotes.open',  'uses' => 'IaQuoteController@getOpenStatus']);
            Route::post('ia_quotes/update_close', ['as' => 'ia_quotes.close', 'uses' => 'IaQuoteController@updateClose']);
        });

    });
});