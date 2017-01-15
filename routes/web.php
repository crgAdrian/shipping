<?php


Route::group(['prefix' => 'admin','middleware' => 'admin'], function () {
    #Admin Dashboard
    Route::get('/','backend\UserController@index')->name('backend.index');

    #Products
    Route::post('products/create','backend\ProductController@store')->name('products.store');

    #Tracking
    Route::post('tracking/create','backend\ShippingTrackingCodeController@store')->name('tracking.store');

    #Settings
    Route::post('settings/edit','backend\SettingController@editDBCSV')->name('settings.editDBCSV');


});

Route::group(['middleware' => 'web'], function () {
    Route::get('/','frontend\ShippingTrackingCodeController@index');
    Route::get('/login','backend\UserController@getLogin')->name('getLogin');
    Route::post('/login','backend\UserController@login')->name('login');

    #Tracking - Search
    Route::post('tracking/search','frontend\ShippingTrackingCodeController@search')->name('tracking.search');

});

