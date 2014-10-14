<?php

namespace Tee\Front;
use Route, Config;

Route::group(['prefix' => Config::get('i18n.locale_preffix')], function() {
    Route::get('/', [
        'as' => 'home',
        'uses' => __NAMESPACE__.'\Controllers\HomeController@index'
    ]);
});