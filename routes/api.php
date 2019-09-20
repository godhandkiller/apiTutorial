<?php

use App\Person;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

Route::prefix('v1')->group(function(){
    Route::apiResource('/person', 'Api\v1\PersonController')->only(['show', 'destroy', 'update', 'store']);

    Route::apiResource('/people', 'Api\v1\PersonController')->only('index');
});