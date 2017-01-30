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