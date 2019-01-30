<?php

Route::group(
    ['middleware' => []], function () {
        Route::get('/', 'VlogController@show');
        Route::put('/', 'VlogController@update');
        Route::delete('/', 'VlogController@destroy');
    }
);
