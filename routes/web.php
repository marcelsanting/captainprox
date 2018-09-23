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
        'statuses' => 'StatusController',
    ]
);
/* personlized routes */
Route::get('/tasks/create/{feature}', 'TaskController@create')->name('tasks.create');

/* Datatable routes */
Route::get('/admin', 'AdminController@index');
Route::get('/admin/data/users', 'UsermanagerController@userdata');
Route::get('/admin/data/feature/tasks/{feature}', 'TaskController@tasksbyFeature');
Route::get('/admin/data/project/tasks/{project}', 'TaskController@tasksbyProject')
        ->name('tasks.project');
Route::get('/admin/data/user/tasks/{user}', 'TaskController@tasksbyUser')
        ->name('tasks.user');
Route::get('/admin/data/features/{project}', 'FeatureController@featuresbyID')
        ->name('projects.features');
Route::get('/admin/data/projects', 'ProjectController@projectsdata');
Route::get('/admin/data/statuses', 'StatusController@statusesdata')
    ->name('statuses.data');

/*
 * Specific routes for the logged user
 */
Route::get('/login', 'SessionController@create')
    ->name('login');
Route::post('/login', 'SessionController@store')
    ->name('sessions.store');
Route::get('/register', 'RegistrationController@create')
    ->name('register');
Route::post('/register', 'RegistrationController@store');
Route::get('/signoff', 'SessionController@destroy');


