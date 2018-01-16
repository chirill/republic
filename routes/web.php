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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin',[
    'uses'=>'AdminPageController@index',
    'as'=>'admin',
])->middleware('auth');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){


    Route::get('users/active/{id}', 'UsersController@activ')->name('users.active');
    Route::get('users/disabled/{id}', 'UsersController@disabled')->name('users.disabled');
    Route::get('users/trash', 'UsersController@trash')->name('users.trash');
    Route::delete('users/kill/{id}', 'UsersController@kill')->name('users.kill');
    Route::post('users/restore/{id}', 'UsersController@restore')->name('users.restore');
    Route::resource('users','UsersController');

    Route::resource('companies','CompanyController');

    Route::resource('locations','LocationsController');
    Route::resource('roles','RolesController');
    Route::resource('lotus_groups','LotusGroupsController');
    Route::resource('lotus_signatures','LotusSignaturesController');
    Route::resource('windows_groups','WindowsGroupsController');
    Route::resource('computers','ComputersController');
    Route::resource('departments','DepartmentsController');

    Route::get('employment_forms/trash', 'EmploymentFormsController@trash')->name('employment_forms.trash');
    Route::delete('employment_forms/kill/{id}', 'EmploymentFormsController@kill')->name('employment_forms.kill');
    Route::post('employment_forms/restore/{id}', 'EmploymentFormsController@restore')->name('employment_forms.restore');
    Route::get('employment_forms/update_form/{id}', 'EmploymentFormsController@update_form')->name('employment_forms.update_form');
    Route::post('employment_forms/update_store', 'EmploymentFormsController@update_store')->name('employment_forms.update_store');
    Route::get('employment_forms/out_form/{id?}', 'EmploymentFormsController@out')->name('employment_forms.out');
    Route::post('employment_forms/out_store', 'EmploymentFormsController@out_store')->name('employment_forms.store');
    Route::get('employment_forms/action/{id}/{action}','EmploymentFormsController@action')->name('employment_forms.action');

    Route::resource('employment_forms','EmploymentFormsController');





});
