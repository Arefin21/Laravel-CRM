<?php

Route::post('/response/{userid}/{seminar_id}/{name}/{email}/{type}', 'smasif\ShurjopayLaravelPackage\ShurjopayController@response')->name('shurjopay.response');
Route::post('/responsesubfee/{userid}/{subscriptionid}/{name}/{email}/{year}/{subscriber_number}/{type}', 'smasif\ShurjopayLaravelPackage\ShurjopayController@responsesubfee')->name('shurjopay.responsesubfee');
