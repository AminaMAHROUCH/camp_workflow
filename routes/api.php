<?php


Route::group([
    'prefix' => 'v1/auth',
    'namespace' => 'Api\V1',
], function ($router) {
    Route::post('login', 'AuthController@login');
});

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api\V1',
    'middleware' => 'api_mobile',
], function ($router) {
    Route::get('workshops', 'WorkshopController@index');
    Route::get('workshops/{id}', 'WorkshopController@show');
    Route::get('groupNews', 'GroupNewsController@index');
    Route::get('responsibleNews', 'ResponsibleNewsController@index');
    Route::get('news', 'NewsController@index');
    Route::get('workshopNews', 'WorkshopNewsController@index');
    Route::get('meeting', 'MeetingController@index');
    Route::get('agendas', 'AgendaController@index');
    Route::get('links', 'LinkController@index');
});