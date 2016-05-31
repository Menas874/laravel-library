<?php
use App\Resource;

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

//Front
Route::get('/', [
  'as'   => 'front.index',
  'uses' => 'FrontController@index'
 ]);

 Route::get('categories/{name}', [
  'as'   => 'front.search.category',
  'uses' => 'FrontController@searchCategory'
  ]);

  Route::get('tags/{name}', [
    'as'   => 'front.search.tag',
    'uses' => 'FrontController@searchTag'
   ]);

  Route::get('latest', [
  'as'   => 'front.search.latest',
  'uses' => 'FrontController@searchLatest'
  ]);

  Route::get('resources/{slug}', [
  'as'   => 'front.view.resource',
  'uses' => 'FrontController@viewResource'
  ]);

  Route::get('resources/download/{src}', [
  'as'   => 'front.download.resource',
  'uses' => 'FrontController@downloadResource'
  ]);

  Route::get('us', [
  'as'   => 'front.view.us',
  'uses' => 'FrontController@viewUs'
  ]);

  Route::get('help', [
    'as' => 'front.view.help',
    'uses' => 'FrontController@viewHelp',
  ]);

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function ()
{
  // Admin index
  Route::get('/', ['as' => 'admin.index', function()
  {
    return view('admin.index');
  }]);

  // Resources CRUD
  Route::resource('resources', 'ResourcesController');
  Route::get('resources/{id}/destroy', [
    'uses' => 'ResourcesController@destroy',
    'as'   => 'admin.resources.destroy'
  ]);

  Route::group(['middleware' => 'admin'], function ()
  {
    // Users CRUD
    Route::resource('users','UsersController');
    Route::get('users/{id}/destroy', [
      'uses' => 'UsersController@destroy',
      'as'   => 'admin.users.destroy'
    ]);

    // Categories CRUD
    Route::resource('categories', 'CategoriesController');
    Route::get('categories/{id}/destroy', [
      'uses' => 'CategoriesController@destroy',
      'as'   => 'admin.categories.destroy'
    ]);

    // Tags CRUD
    Route::resource('tags', 'TagsController');
    Route::get('tags/{id}/destroy', [
      'uses' => 'TagsController@destroy',
      'as'   => 'admin.tags.destroy'
    ]);
  });

});

// Authentication routes...
Route::get('admin/auth/login', [
  'uses' => 'Auth\AuthController@getLogin',
  'as' => 'admin.auth.login',
  ]);
Route::post('admin/auth/login', [
  'uses' => 'Auth\AuthController@postLogin',
  'as' => 'admin.auth.login',
]);
Route::get('admin/auth/logout', [
  'uses' => 'Auth\AuthController@getLogout',
  'as' => 'admin.auth.logout',
]);
