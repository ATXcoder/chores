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

Route::get('/home', 'HomeController@index');

/*
 * CHORE Routes
 */


/*
 * ADMIN Routes
 */
Route::get('/admin',function(){
    return view('admin.index');
});
Route::get('/admin/chore/new', 'ChoreController@create');
Route::post('/admin/chore/new','ChoreController@store');
Route::get('/admin/chore/assign','AdminController@choreAssignment');
Route::get('/admin/user', 'AdminController@getUsers');