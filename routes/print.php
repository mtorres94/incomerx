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
    });
});
