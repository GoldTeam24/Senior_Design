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

// Root Route
Route::get('/', function () {
    return view('welcome');
});

// Search Routes
Route::get('search',[ 'as' => 'search', 'uses' =>  'SearchController@index' ]);

// Concept Routes
Route::get('concept/linkChild/{id}',[ 'as' => 'linkChild', 'uses' => 'conceptController@linkChild']);
Route::get('concept/linkParent/{id}',[ 'as' => 'linkParent', 'uses' => 'conceptController@linkParent']);
Route::post('concept/linkChild/create',['as' => 'storeChildLink', 'uses' => 'ConceptController@storeChildLink']);
Route::post('concept/linkParent/create',['as' => 'storeParentLink', 'uses' => 'ConceptController@storeParentLink']);

// Process Routes
Route::get('process/create/{conceptId}/{conceptName}',[ 'as' => 'createProcess', 'uses' => 'ProcessController@create']);
Route::get('processStep/create/{processId}/{processName}/{step}',[ 'as' => 'createProcessStep', 'uses' => 'ProcessStepController@create']);

// Process Step Routes
Route::get('processStep/edit/{id}/{processName}', ['as' => 'editProcessStep', 'uses' => 'ProcessStepController@edit']);

// Authorization Routing
Auth::routes();

// Resource Routes
Route::resource('search/name', 'SearchController@search');
Route::resource('concept', 'ConceptController');
Route::resource('process', 'ProcessController');
Route::resource('processStep', 'ProcessStepController');
Route::resource('concepts', 'ApiController');