<?php
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    #Products
    #All Products
    $api->get('products','App\Http\Controllers\API\v1\ProductController@index');
    #Create Product
    $api->post('products/create','App\Http\Controllers\API\v1\ProductController@store');

    #Tracking
    #All
    $api->get('tracking','App\Http\Controllers\API\v1\ShippingTrackingCodeController@index');
    #Create
    $api->post('tracking/create','App\Http\Controllers\API\v1\ShippingTrackingCodeController@store');
    #Show
    $api->get('tracking/{tracking_code}/code','App\Http\Controllers\API\v1\ShippingTrackingCodeController@show');





});