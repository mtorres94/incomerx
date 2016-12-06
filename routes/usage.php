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
            Route::post('quotes/verify_open',  ['as' => 'quotes.open',  'uses' => 'ExportOceanQuotesController@getOpenStatus']);
            Route::post('quotes/update_close', ['as' => 'quotes.close', 'uses' => 'ExportOceanQuotesController@updateClose']);

            Route::post('shipment_entries/verify_open',  ['as' => 'shipment_entries.open',  'uses' => 'ShipmentEntryController@getOpenStatus']);
            Route::post('shipment_entries/update_close', ['as' => 'shipment_entries.close', 'uses' => 'ShipmentEntryController@updateClose']);
        });

    });
});