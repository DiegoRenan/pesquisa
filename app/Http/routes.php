<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'needsRole'], 'is' => ['admin', 'editor'], 'any' => true], function()
{
    Route::pattern('id', '[0-9]+');

    /* Dashboard */
    Route::get('/',                     ['as'   =>  'admin.index',      'uses'  =>  'DashboardController@index']);

    /* News Controller*/
    Route::get('/news/',                ['as'   =>  'news.index',       'uses'  =>  'NewsController@index']);
    Route::get('/news/create',          ['as'   =>  'news.create',      'uses'  =>  'NewsController@create']);
    Route::post('/news/',               ['as'   =>  'news.store',       'uses'  =>  'NewsController@store']);
    Route::get('/news/{id}/edit',       ['as'   =>  'news.edit',        'uses'  =>  'NewsController@edit']);
    Route::get('/news/{id}/show',       ['as'   =>  'news.show',        'uses'  =>  'NewsController@show']);
    Route::put('/news/{id}/',           ['as'   =>  'news.update',      'uses'  =>  'NewsController@update']);
    Route::delete('/news/{id}/',        ['as'   =>  'news.delete',      'uses'  =>  'NewsController@delete']);

    /* Edital Controller*/
    Route::get('/edital/',              ['as'   =>  'edital.index',     'uses'  =>  'EditalController@index']);
    Route::get('/edital/create',        ['as'   =>  'edital.create',    'uses'  =>  'EditalController@create']);
    Route::post('/edital/',             ['as'   =>  'edital.store',     'uses'  =>  'EditalController@store']);
    Route::get('/edital/{id}/edit',     ['as'   =>  'edital.edit',      'uses'  =>  'EditalController@edit']);
    Route::get('/edital/{id}/show',     ['as'   =>  'edital.show',      'uses'  =>  'EditalController@show']);
    Route::put('/edital/{id}/',         ['as'   =>  'edital.update',    'uses'  =>  'EditalController@update']);
    Route::delete('/edital/{id}/',      ['as'   =>  'edital.delete',    'uses'  =>  'EditalController@delete']);
    Route::get('/edital/{id}/download', ['as'   =>  'edital.download',  'uses'  =>  'EditalController@download']);

    /* Document Controller*/
    Route::get('/document/',              ['as'   =>  'document.index',     'uses'  =>  'DocumentController@index']);
    Route::get('/document/create',        ['as'   =>  'document.create',    'uses'  =>  'DocumentController@create']);
    Route::post('/document/',             ['as'   =>  'document.store',     'uses'  =>  'DocumentController@store']);
    Route::get('/document/{id}/edit',     ['as'   =>  'document.edit',      'uses'  =>  'DocumentController@edit']);
    Route::get('/document/{id}/show',     ['as'   =>  'document.show',      'uses'  =>  'DocumentController@show']);
    Route::put('/document/{id}/',         ['as'   =>  'document.update',    'uses'  =>  'DocumentController@update']);
    Route::delete('/document/{id}/',      ['as'   =>  'document.delete',    'uses'  =>  'DocumentController@delete']);
    Route::get('/document/{id}/download', ['as'   =>  'document.download',  'uses'  =>  'DocumentController@download']);

    /* Event Controller*/
    Route::get('/event/',              ['as'   =>  'event.index',     'uses'  =>  'EventController@index']);
    Route::get('/event/create',        ['as'   =>  'event.create',    'uses'  =>  'EventController@create']);
    Route::post('/event/',             ['as'   =>  'event.store',     'uses'  =>  'EventController@store']);
    Route::get('/event/{id}/edit',     ['as'   =>  'event.edit',      'uses'  =>  'EventController@edit']);
    Route::get('/event/{id}/show',     ['as'   =>  'event.show',      'uses'  =>  'EventController@show']);
    Route::put('/event/{id}/',         ['as'   =>  'event.update',    'uses'  =>  'EventController@update']);
    Route::delete('/event/{id}/',      ['as'   =>  'event.delete',    'uses'  =>  'EventController@delete']);

    /* Users Controller */
    Route::get('/users',                ['as'   =>  'users.list',       'uses'  =>  'UserController@users']);

});

/*Guest route*/
Route::group(['prefix' => 'blog', 'namespace' => 'Blog', ], function(){

    Route::pattern('id', '[0-9]+');

    Route::get('/',                      ['as'   =>  'blog.index',       'uses'  =>  'BlogController@index']);

    Route::get('/news',                  ['as'   =>  'blog.newses',      'uses'  =>  'BlogController@newses']);
    Route::get('/news/{id}',             ['as'   =>  'blog.news',      'uses'  =>  'BlogController@news']);

    Route::get('/document',              ['as'   =>  'blog.documents',   'uses'  =>  'BlogController@documents']);
    Route::get('/document/{id}',         ['as'   =>  'blog.document',   'uses'  =>  'BlogController@document']);

    Route::get('/edital',                ['as'   =>  'blog.editals',     'uses'  =>  'BlogController@editals']);
    Route::get('/edital/{id}',           ['as'   =>  'blog.edital',     'uses'  =>  'BlogController@edital']);

    Route::get('/event',                ['as'   =>  'blog.events',     'uses'  =>  'BlogController@events']);
    Route::get('/event/{id}',           ['as'   =>  'blog.event',     'uses'  =>  'BlogController@event']);

});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);