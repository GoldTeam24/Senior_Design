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

Route::get('concept/{id}',[ 'as' => 'concept', 'uses' => 'ConceptController@index' ]);

Route::get('process/create/{conceptId}',[ 'as' => 'createProcess', 'uses' => 'ProcessController@create']);

Route::get('process/{id}',[ 'as' => 'process', 'uses' => 'ProcessController@index' ]);

Route::resource('search/name', 'SearchController@search');

Auth::routes();

Route::post('concept/create','ConceptController@store');

Route::post('process/create',['as' => 'storeProcess', 'uses' => 'ProcessController@store']);

Route::get('/home', 'HomeController@index');
