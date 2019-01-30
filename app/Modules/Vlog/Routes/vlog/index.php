<?php

Route::group(
    ['middleware' => []], function () {
        Route::get('/', 'VlogController@index');
        Route::post('/', 'VlogController@store');
    }
);
