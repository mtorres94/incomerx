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
            Route::get('shipment_entries/pdf/{token}/{id}', ['as' => 'shipment_entries.pdf', 'uses' => 'ShipmentEntryController@pdf']);
            Route::get('bill_of_lading/pdf/{token}/{id}', ['as' => 'bill_of_lading.pdf', 'uses' => 'BillOfLadingController@pdf']);
            Route::get('bill_of_lading/delivery_order/{token}/{id}', ['as' => 'bill_of_lading.delivery_order', 'uses' => 'BillOfLadingController@delivery_order']);
            Route::get('cargo_loader/pdf/{token}/{id}', ['as' => 'cargo_loader.pdf', 'uses' => 'CargoLoaderController@pdf']);
        });
    });
});
