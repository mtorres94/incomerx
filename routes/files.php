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
            Route::post('receipts_entries/upload', ['as' => 'receipts_entries.upload', 'uses' => 'ReceiptEntryController@upload']);
            Route::post('receipts_entries/delete', ['as' => 'receipts_entries.delete', 'uses' => 'ReceiptEntryController@delete']);
            Route::get('receipts_entries/download', ['as' => 'receipts_entries.download', 'uses' => 'ReceiptEntryController@download']);
            Route::get('receipts_entries/{receipts_entries}/get', ['as'  => 'receipts_entries.get', 'uses' => 'ReceiptEntryController@get']);
        });
    });

    Route::group(['namespace' => 'Export'], function () {
        Route::group(['namespace' => 'OceanExport'], function () {
            Route::post('bill_of_lading/upload', ['as' => 'bill_of_lading.upload', 'uses' => 'EoBillOfLadingController@upload']);
            Route::post('bill_of_lading/delete', ['as' => 'bill_of_lading.delete', 'uses' => 'EoBillOfLadingController@delete']);
            Route::get('bill_of_lading/{bill_of_lading}/get', ['as'  => 'bill_of_lading.get', 'uses' => 'EoBillOfLadingController@get']);
        });
    });
});