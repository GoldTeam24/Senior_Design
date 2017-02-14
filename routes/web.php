<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('search',[ 'as' => 'search', 'uses' =>  'SearchController@index' ]);

Route::get('concept/create',[ 'as' => 'createConcept', 'uses' => 'ConceptController@create']);

Route::get('concept/edit/{id}', ['as' => 'editConcept', 'uses' => 'ConceptController@edit']);

Route::get('concept/{id}',[ 'as' => 'concept', 'uses' => 'ConceptController@index' ]);

Route::get('process/create/{conceptId}/{conceptName}',[ 'as' => 'createProcess', 'uses' => 'ProcessController@create']);

Route::get('process/edit/{id}', ['as' => 'editProcess', 'uses' => 'ProcessController@edit']);

Route::get('process/{id}',[ 'as' => 'process', 'uses' => 'ProcessController@index']);

Route::get('processStep/create/{processId}/{processName}/{step}',[ 'as' => 'createProcessStep', 'uses' => 'ProcessStepController@create']);

Route::get('processStep/edit/{id}/{processName}', ['as' => 'editProcessStep', 'uses' => 'ProcessStepController@edit']);

Route::resource('search/name', 'SearchController@search');

Auth::routes();

Route::post('concept/create','ConceptController@store');

Route::post('process/create',['as' => 'storeProcess', 'uses' => 'ProcessController@store']);

Route::post('processStep/create',['as' => 'storeProcessStep', 'uses' => 'ProcessStepController@store']);

Route::put('concept/update',['as' => 'updateConcept', 'uses' => 'ConceptController@update']);

Route::put('process/update',['as' => 'updateProcess', 'uses' => 'ProcessController@update']);

Route::put('processStep/update',['as' => 'updateProcessStep', 'uses' => 'ProcessStepController@update']);

Route::get('/home', 'HomeController@index');

Route::resource('concepts', 'ApiController');