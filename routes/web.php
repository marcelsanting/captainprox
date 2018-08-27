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
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/users', 'UsermanagerController@index')->name('usermanager');


/*
 * Specific routes for the logged user
 */
Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::get('/register', 'RegistrationController@create')->name('register');
Route::post('/register', 'RegistrationController@store');
Route::get('/signoff', 'SessionController@destroy');

