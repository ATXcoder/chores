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
 * USER Routes
 */
// Chores
Route::get('/user/chore', 'UserChoresController@index');
Route::post('/user/chore/{id}', 'UserChoresController@update');
// Rewards
Route::get('user/reward','UserRewardsController@index');
Route::post('/user/reward','UserRewardsController@store');
Route::post('/user/reward/{id}','UserRewardsController@update');


/*
 * BANK Routes
 */
Route::get('/bank', 'BankController@index');


/*
 * REWARD Routes
 */
Route::get('/reward','RewardController@index');
Route::get('/reward/{id}','RewardController@show');


/*
 * NOTIFICATION Routes
 */
Route::get('/notification', 'NotificationController@index');
Route::get('/notification/{id}', "NotificationController@edit");


/*
 * ADMIN Routes
 */
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });

    /**
     * CHORES
     */
    Route::get('/admin/chore/approval', 'ChoreApprovalController@index');
    Route::post('/admin/chore/approval', 'ChoreApprovalController@update');
    Route::get('/admin/chore/new', 'ChoreController@create');
    Route::post('/admin/chore/new', 'ChoreController@store');
    Route::get('/admin/chore/assign', 'AdminController@choreAssignment');
    Route::post('/admin/chore/assign', 'AdminController@assignChore');

    Route::get('/admin/chore/report', 'ChoreReportController@index');
    Route::post('/admin/chore/report', 'ChoreReportController@choreReport');

    Route::get('/admin/chore/manage', function () {
        return view('chores.manager');
    });
    Route::get('/admin/chore/edit', 'ChoreManagementController@index');
    Route::get('/admin/chore/edit/{id}', 'ChoreManagementController@edit');
    Route::post('/admin/chore/edit/{id}', 'ChoreManagementController@update');

    /**
     * USERS
     */
    Route::get('/admin/user', 'AdminController@getUsers');
    Route::get('/admin/user/new', function () {
        return view('auth.register');
    });
    Route::get('/admin/user/chore', function () {
        return view('coming-soon');
    });
    Route::get('/admin/user/{id}', 'AdminController@editUser');
    Route::post('/admin/user/{id}', 'AdminController@saveUser');

    /**
     * REWARDS
     */
    Route::get('/admin/reward/create', 'RewardController@create');
    Route::post('/admin/reward/create', 'RewardController@store');
});