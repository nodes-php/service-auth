<?php

Route::group([
    'namespace' => 'Nodes\ServiceAuthenticator\Http\Controllers',
    'prefix'    => 'service-authenticator/services',
], function () {
    Route::post('/refresh', [
        'uses' => 'ServicesController@refresh',
    ]);
});
