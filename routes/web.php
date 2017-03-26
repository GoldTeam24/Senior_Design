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
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [ 'as' => 'indexWelcome', 'uses' => 'WelcomeController@index']);

// Search Routes
Route::get('search',[ 'as' => 'search', 'uses' =>  'SearchController@index' ]);

// Concept Routes
Route::get('concept/linkChild/create/{id}',[ 'as' => 'createChildLink', 'uses' => 'ConceptController@createChildLink']);
Route::get('concept/linkParent/create/{id}',[ 'as' => 'createParentLink', 'uses' => 'ConceptController@createParentLink']);
Route::post('concept/linkChild/store',['as' => 'storeChildLink', 'uses' => 'ConceptController@storeChildLink']);
Route::post('concept/linkParent/store',['as' => 'storeParentLink', 'uses' => 'ConceptController@storeParentLink']);
Route::post('concept/linkChild/destroy',['as' => 'destroyChildLink', 'uses' => 'ConceptController@destroyChildLink']);
Route::post('concept/linkParent/destroy',['as' => 'destroyParentLink', 'uses' => 'ConceptController@destroyParentLink']);


// Process Routes
Route::get('process/create/{conceptId}/{conceptName}',[ 'as' => 'createProcess', 'uses' => 'ProcessController@create']);
Route::get('processStep/create/{processId}/{processName}/{step}',[ 'as' => 'createProcessStep', 'uses' => 'ProcessStepController@create']);

// Process Step Routes
Route::get('processStep/edit/{id}/{processName}', ['as' => 'editProcessStep', 'uses' => 'ProcessStepController@edit']);

// Authorization Routing
Auth::routes();

// API Routes
Route::get('api/concepts',[ 'as' => 'indexConcept', 'uses' => 'ApiController@indexConcept']);
Route::get('api/processes',[ 'as' => 'indexProcess', 'uses' => 'ApiController@indexProcess']);
Route::get('api/processSteps',[ 'as' => 'indexProcessStep', 'uses' => 'ApiController@indexProcessStep']);
Route::get('api/concepts/{id}',[ 'as' => 'showConcepts', 'uses' => 'ApiController@showConcepts']);
Route::get('api/processes/{id}',[ 'as' => 'showProcesses', 'uses' => 'ApiController@showProcesses']);
Route::get('api/processSteps/{id}',[ 'as' => 'showProcessSteps', 'uses' => 'ApiController@showProcessSteps']);

// Resource Routes
Route::resource('/', 'WelcomeController@index');
Route::resource('search/name', 'SearchController@search');
Route::resource('concept', 'ConceptController');
Route::resource('process', 'ProcessController');
Route::resource('processStep', 'ProcessStepController');
Route::resource('api', 'ApiController');
Route::resource('user', 'UserController');