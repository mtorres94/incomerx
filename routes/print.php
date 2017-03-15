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
    Route::group(['namespace' => 'Warehouse'], function () {
        Route::group(['namespace' => 'Receipts'], function () {
            Route::get('receipts_entries/report', ['as' => 'receipts_entries.report', 'uses' => 'ReceiptEntryController@report']);
            Route::get('receipts_entries/cargo_report', ['as' => 'receipts_entries.cargo_report', 'uses' => 'ReceiptEntryController@cargo_report']);
            Route::post('receipts_entries/cargo_report_view', ['as' => 'receipts_entries.cargo_report_view', 'uses' => 'ReceiptEntryController@cargo_report_view']);
        });
        Route::group(['namespace' => 'Pickup'], function () {
            Route::get('orders_entries/report', ['as' => 'orders_entries.report', 'uses' => 'OrderEntryController@report']);
            Route::get('orders_entries/pdf/{token}/{id}', ['as' => 'orders_entries.pdf', 'uses' => 'OrderEntryController@pdf']);
        });
    });

    Route::group(['namespace' => 'Export'], function () {
        Route::group(['namespace' => 'OceanExport'], function () {
            Route::get('eo_quotes/report', ['as' => 'eo_quotes.report', 'uses' => 'EoQuotesController@report']);
            Route::get('shipment_entries/report', ['as' => 'shipment_entries.report', 'uses' => 'EoShipmentEntryController@report']);
            Route::get('bill_of_lading/report', ['as' => 'bill_of_lading.report', 'uses' => 'EoBillOfLadingController@report']);
            Route::get('cargo_loader/report', ['as' => 'cargo_loader.report', 'uses' => 'EoCargoLoaderController@report']);
            Route::get('bill_of_lading/ocean_manifest', ['as' => 'bill_of_lading.ocean_manifest', 'uses' => 'EoBillOfLadingController@oceanManifest']);
            Route::post('bill_of_lading/manifest_report', ['as' => 'bill_of_lading.manifest_report', 'uses' => 'EoBillOfLadingController@manifest_report']);

        });
    });

    Route::group(['namespace' => 'Import'], function () {
        Route::group(['namespace' => 'Ocean'], function () {
            Route::get('io_quotes/report', ['as' => 'io_quotes.report', 'uses' => 'IoQuoteController@report']);
            Route::get('io_routing_order/report', ['as' => 'io_routing_order.report', 'uses' => 'IoRoutingOrderController@report']);
            Route::get('io_bill_of_lading/report', ['as' => 'io_bill_of_lading.report', 'uses' => 'IoBillOfLadingController@report']);
            Route::post('io_bill_of_lading/excel', ['as' => 'io_bill_of_lading.excel', 'uses' => 'IoBillOfLadingController@excel']);

        });
        Route::group(['namespace' => 'Air'], function () {
            Route::get('ia_quotes/report', ['as' => 'ia_quotes.report', 'uses' => 'IaQuoteController@report']);
            Route::get('ia_routing_order/report', ['as' => 'ia_routing_order.report', 'uses' => 'IaRoutingOrderController@report']);
            Route::get('ia_bill_of_lading/report', ['as' => 'ia_bill_of_lading.report', 'uses' => 'IaBillOfLadingController@report']);
            Route::post('ia_bill_of_lading/excel', ['as' => 'ia_bill_of_lading.excel', 'uses' => 'IaBillOfLadingController@excel']);
        });
    });
});
