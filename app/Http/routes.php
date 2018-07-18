<?php

$admin = [
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'admin'
];

Route::group(['middleware' => 'web'], function () use ($admin) {
    Route::get('/', ['as' => 'index', 'uses' => 'PageController@index']);

    Route::get('/rooms', ['as' => 'rooms.index', 'uses' => 'RoomController@index']);
    Route::get('/rooms/search', ['as' => 'rooms.search', 'uses' => 'RoomController@search']);

    Route::get('/orders/create/{no}', ['as' => 'orders.create', 'uses' => 'OrderController@create']);
    Route::post('/orders/store', ['as' => 'orders.store', 'uses' => 'OrderController@store']);

    Route::auth();

    Route::get('/profile', ['as' => 'profile', 'uses' => 'ProfileController@index']);
    Route::post('/profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);

    /************************************
    * Admin
    ************************************/
    Route::group($admin, function () {
        Route::get('/', 'AdminController@index');

        Route::post('search', ['as' => 'admin.search', 'uses' => 'AdminController@search']);

        Route::get('orders', ['as' => 'admin.orders.index', 'uses' => 'OrderController@index']);
        Route::delete('orders/{id}', ['as' => 'admin.orders.destroy', 'uses' => 'OrderController@destroy']);
        Route::patch('oders/{id}', ['as' => 'admin.orders.update', 'uses' => 'OrderController@update']);
        Route::get('orders/{id}/edit', ['as'=>'admin.orders.edit', 'uses'=>'OrderController@edit']);

        Route::get('setting', ['as' => 'admin.setting', 'uses' => 'SettingController@index']);
        Route::post('setting', ['as' => 'admin.setting.update', 'uses' => 'SettingController@update']);

        Route::resource('users', 'UserController');
        Route::resource('rooms/types', 'RoomTypeController');
        Route::resource('rooms', 'RoomController');
    });
});
