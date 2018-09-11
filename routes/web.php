<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


/*
 * Here are the backend routes for the admin panel
 */
Route::get('/admin', 'AdminController@index')
    ->name('admin');
Route::get('/admin/users', 'UsermanagerController@index')
    ->name('usermanager');
Route::get('/admin/data/users', 'DataController@userdata');


/*
 * Specific routes for the logged user
 */
Route::get('/login', 'SessionController@create')
    ->name('login');
Route::post('/login', 'SessionController@store');
Route::get('/register', 'RegistrationController@create')
    ->name('register');
Route::post('/register', 'RegistrationController@store');
Route::get('/signoff', 'SessionController@destroy');

/*
 * Specific routes for the Project Manager
 */

/* Project */
Route::get('/admin/projects/list', 'ProjectController@index')
    ->name('list.project');
Route::get('admin/projects/show/{project}', 'ProjectController@show')
    ->name('show.project');
Route::get('admin/projects/new', 'ProjectController@create')
    ->name('new.project');
Route::get('/admin/data/projects', 'DataController@projectsdata');
Route::post('/admin/projects/store', 'ProjectController@store');

/* Status */
Route::get('/admin/projects/status/list', 'StatusController@index')
    ->name('list.status');
Route::get('/admin/data/statuses', 'DataController@statusesdata');
Route::post('/admin/data/statuses', 'StatusController@store');

/* Features */
Route::get('admin/features/show/{feature}', 'FeatureController@show')
    ->name('show.feature');
Route::post('/admin/feature/store', 'FeatureController@store');
Route::get('/admin/data/features/{feature}', 'DataController@featuresbyID');


