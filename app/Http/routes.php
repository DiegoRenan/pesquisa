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

Route::get('home', 'WelcomeController@index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
    Route::pattern('id', '[0-9]+');

    /*
    * Routes for dashboard
    * Access for Admins, Editors and Coordenadors
    */
    Route::group(['middleware' => ['auth', 'needsRole'], 'is' => ['admin', 'editor', 'coordenador'], 'any' => true], function() {

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

        Route::resource('pesquisador','PesquisadorController');

    });

    /*
     * Routes for admin stuff
     * Access only for admins
     */
    Route::group(['prefix' => 'stuff', 'middleware' => ['auth', 'needsRole'], 'is' => 'admin'], function() {

        /* Index Stuff */
        Route::get('/', ['as' => 'admin.stuff.index', function(){
            return view('admin.stuff.index');
        }]);

        /* Usuários Controller */
        Route::resource('users', 'UserController');

        /* Categorias usuários Controller */
        Route::resource('roles', 'RolesController');

        /* Titulação Controller */
        Route::resource('titles', 'TitlesController');

        /* Categorias pesquisador Controller */
        Route::resource('categories', 'CategoriesController');

        /* Regime Trabalh0 Controller */
        Route::resource('works', 'WorksController');

        /* Campus Controller */
        Route::resource('campus', 'CampusController');

        /* Institutos Controller */
        Route::resource('institutes', 'InstitutesController');

        /* Departamentos Controller */
        Route::resource('departments', 'DepartmentsController');

        /* Áreas CNPQ Controller */
        Route::resource('areacnpq', 'AreasCnpqController');

        /* Sub-Áreas CNPQ Controller */
        Route::resource('subareacnpq', 'SubAreasCnpqController');
    });

});

/*  */
Route::group(['prefix' => 'researcher', 'namespace' => 'Research'], function()
{
    Route::pattern('id', '[0-9]+');

    /* Cadastrar pesquisador */
    Route::get('/create', ['as' => 'researcher.researcher.create', 'uses' => 'ResearcherController@create']);

    /* Salvar pesquisador */
    Route::post('/', ['as' => 'researcher.researcher.store', 'uses' => 'ResearcherController@store']);

    Route::group(['middleware' => ['auth', 'needsRole'], 'is' => ['pesquisador']], function()
    {

        /* Dashboard */
        Route::get('/', ['as'   =>  'researcher.dashboard',  'uses'  =>  'DashboardController@index']);

        /* Editar pesquisador */
        Route::get('/{researcher}/edit', ['as' => 'researcher.researcher.edit', 'uses' => 'ResearcherController@edit']);

         /* Alterar pesquisador */
        Route::put('/{researcher}', ['as' => 'researcher.researcher.update', 'uses' => 'ResearcherController@update']);

        /* Editar Senhas pesquisador */
        Route::get('/password', ['as' => 'researcher.password.edit', 'uses' => 'ResearcherController@editPassword']);

        /* Alterar Senhas pesquisador */
        Route::put('/password', ['as' => 'researcher.password.update', 'uses' => 'ResearcherController@updatePassword']);

        /* Grupo de Pesquisa */
        Route::resource('grupopesquisa', 'GrupoPesquisaController');


        /* Projeto */
        Route::group(['prefix' => 'project'], function()
        {
            Route::get('/create', ['as' => 'project.create', 'uses' => 'ProjectController@create']);
            Route::get('/api/dados', ['as' => 'project.getDados', 'uses' => 'ProjectController@getDados']);
            Route::post('/api/save', ['as' => 'project.saveDados', 'uses' => 'ProjectController@saveDados']);
            Route::post('/api/membro/search', ['as' => 'project.searchMembro', 'uses' => 'ProjectController@searchMembro']);
            Route::post('/api/membro/save', ['as' => 'project.addMembro', 'uses' => 'ProjectController@addMembro']);
        });

    });

    /* encontrar institutos */
    Route::get('/{id}/institutes', ['as' => 'researcher.institutes', 'uses' => 'ResearcherController@getInstitutes']);

    /* encontrar departamentos */
    Route::get('/{id}/departments', ['as' => 'researcher.departments', 'uses' => 'ResearcherController@getDepartments']);
});

/*Guest route*/
Route::group(['prefix' => 'blog', 'namespace' => 'Blog', ], function(){

    Route::pattern('id', '[0-9]+');
    Route::pattern('year', '^\d{4}$');
    Route::pattern('month', '^(0?[1-9]|1[012])$');

    Route::get('/',                      ['as'   =>  'blog.index',     'uses'  =>  'BlogController@index']);

    Route::get('/news',                  ['as'   =>  'blog.newses',    'uses'  =>  'BlogController@newses']);
    Route::get('/news/{id}',             ['as'   =>  'blog.news',      'uses'  =>  'BlogController@news']);

    Route::get('/document',              ['as'   =>  'blog.documents',  'uses'  =>  'BlogController@documents']);
    Route::get('/document/{id}',         ['as'   =>  'blog.document',   'uses'  =>  'BlogController@document']);

    Route::get('/edital',                ['as'   =>  'blog.editals',    'uses'  =>  'BlogController@editals']);
    Route::get('/edital/{id}',           ['as'   =>  'blog.edital',     'uses'  =>  'BlogController@edital']);

    Route::get('/event',                 ['as'   =>  'blog.events',    'uses'  =>  'BlogController@events']);
    Route::get('/event/{id}',            ['as'   =>  'blog.event',     'uses'  =>  'BlogController@event']);

    Route::get('/api/feed/{year?}/{month?}/', ['as'   =>  'api.getPub',     'uses'  =>  'BlogController@getPub']);

});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);