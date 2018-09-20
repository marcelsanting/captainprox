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
Route::resources(
    [
        'users' => 'UsermanagerController',
        'tasks' => 'TaskController',
        'features' => 'FeatureController',
        'projects' => 'ProjectController',
        'comments' => 'CommentController',
    ]
);

/* Datatable routes */
Route::get('/admin', 'AdminController@index');
Route::get('/admin/data/users', 'UsermanagerController@userdata');
Route::get('/admin/data/feature/tasks/{feature}', 'TaskController@tasksbyFeature');
Route::get('/admin/data/project/tasks/{project}', 'TaskController@tasksbyProject');
Route::get('/admin/data/user/tasks/{user}', 'TaskController@tasksbyUser');
Route::get('/admin/data/features/{feature}', 'DataController@featuresbyID');
Route::get('/admin/data/projects', 'ProjectController@projectsdata');

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

/* Status */
Route::get('/admin/projects/status/list', 'StatusController@index')
    ->name('list.status');
Route::get('/admin/data/statuses', 'DataController@statusesdata');
Route::post('/admin/data/statuses', 'StatusController@store');


