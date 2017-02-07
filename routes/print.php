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
            Route::get('receipts_entries/pdf/{token}/{id}', ['as' => 'receipts_entries.pdf', 'uses' => 'ReceiptEntryController@pdf']);
            Route::get('receipts_entries/label/{token}/{id}', ['as' => 'receipts_entries.label', 'uses' => 'ReceiptEntryController@label']);
        });
        Route::group(['namespace' => 'Pickup'], function () {
            Route::get('orders_entries/pdf/{token}/{id}', ['as' => 'orders_entries.pdf', 'uses' => 'OrderEntryController@pdf']);

        });
    });

    Route::group(['namespace' => 'Export'], function () {
        Route::group(['namespace' => 'OceanExport'], function () {
            Route::get('eo_quotes/pdf/{token}/{id}', ['as' => 'eo_quotes.pdf', 'uses' => 'EoQuotesController@pdf']);
            Route::get('shipment_entries/pdf/{token}/{id}', ['as' => 'shipment_entries.pdf', 'uses' => 'EoShipmentEntryController@pdf']);
            Route::get('shipment_entries/container_release/{token}/{id}', ['as' => 'shipment_entries.container_release', 'uses' => 'EoShipmentEntryController@container_release']);
            Route::get('bill_of_lading/pdf/{token}/{id}', ['as' => 'bill_of_lading.pdf', 'uses' => 'EoBillOfLadingController@pdf']);
            Route::get('bill_of_lading/delivery_order/{token}/{id}', ['as' => 'bill_of_lading.delivery_order', 'uses' => 'EoBillOfLadingController@delivery_order']);
            Route::get('bill_of_lading/label/{token}/{id}', ['as' => 'bill_of_lading.label', 'uses' => 'EoBillOfLadingController@label']);
            Route::get('cargo_loader/pdf/{token}/{id}', ['as' => 'cargo_loader.pdf', 'uses' => 'EoCargoLoaderController@pdf']);
        });
    });

    Route::group(['namespace' => 'Import'], function () {
        Route::group(['namespace' => 'Ocean'], function () {
            Route::get('io_quotes/pdf/{token}/{id}', ['as' => 'io_quotes.pdf', 'uses' => 'IoQuoteController@pdf']);
            Route::get('io_routing_order/pdf/{token}/{id}', ['as' => 'io_routing_order.pdf', 'uses' => 'IoRoutingOrderController@pdf']);
            Route::get('io_bill_of_lading/pre_alert/{token}/{id}', ['as' => 'io_bill_of_lading.pre_alert', 'uses' => 'IoBillOfLadingController@pre_alert']);
            Route::get('io_bill_of_lading/delivery_order/{token}/{id}', ['as' => 'io_bill_of_lading.delivery_order', 'uses' => 'IoBillOfLadingController@delivery_order']);
            Route::get('io_bill_of_lading/bill_of_lading/{token}/{id}', ['as' => 'io_bill_of_lading.bill_of_lading', 'uses' => 'IoBillOfLadingController@bill_of_lading']);
            Route::get('io_bill_of_lading/arrival_notice/{token}/{id}', ['as' => 'io_bill_of_lading.arrival_notice', 'uses' => 'IoBillOfLadingController@arrival_notice']);
            Route::post('io_bill_of_lading/excel', ['as' => 'io_bill_of_lading.excel', 'uses' => 'IoBillOfLadingController@excel']);

        });
        Route::group(['namespace' => 'Air'], function () {
            Route::get('ia_quotes/pdf/{token}/{id}', ['as' => 'ia_quotes.pdf', 'uses' => 'IaQuoteController@pdf']);
            Route::get('ia_routing_order/pdf/{token}/{id}', ['as' => 'ia_routing_order.pdf', 'uses' => 'IaRoutingOrderController@pdf']);
            Route::get('ia_bill_of_lading/pre_alert/{token}/{id}', ['as' => 'ia_bill_of_lading.pre_alert', 'uses' => 'IaBillOfLadingController@pre_alert']);
            Route::get('ia_bill_of_lading/delivery_order/{token}/{id}', ['as' => 'ia_bill_of_lading.delivery_order', 'uses' => 'IaBillOfLadingController@delivery_order']);
            Route::get('ia_bill_of_lading/bill_of_lading/{token}/{id}', ['as' => 'ia_bill_of_lading.bill_of_lading', 'uses' => 'IaBillOfLadingController@bill_of_lading']);
            Route::get('ia_bill_of_lading/arrival_notice/{token}/{id}', ['as' => 'ia_bill_of_lading.arrival_notice', 'uses' => 'IaBillOfLadingController@arrival_notice']);
            Route::post('ia_bill_of_lading/excel', ['as' => 'ia_bill_of_lading.excel', 'uses' => 'IaBillOfLadingController@excel']);
        });
    });
});
