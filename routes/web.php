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

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/phpinfo', 'HomeController@phpinfo');
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/changePassword', 'HomeController@showChangePasswordForm');
    Route::post('/changePassword', 'HomeController@changePassword')->name('changePassword');

    Route::resource('roles', 'RolesController');
    Route::get('roles/{id}/delete', 'RolesController@delete');

    Route::get('users/recuperar', 'UsersController@recuperar')->name('users.recuperar');
    Route::get('users/{id}/restore', 'UsersController@restore')->name('users.restore');
    Route::get('users/{id}/delete', 'UsersController@delete');
    Route::get('users/{id}/undelete', 'UsersController@undelete');
    Route::resource('users', 'UsersController');
    

    Route::resource('empresas', 'EmpresasController');
    Route::get('empresas/{id}/delete', 'EmpresasController@delete');

    Route::resource('abejas', 'AbejaController');
    Route::get('abejas/{id}/delete', 'AbejaController@delete');
    Route::get('abejas/{id}/pdf', 'AbejaController@pdf')->name('abejas.pdf');

    Route::resource('aplicaciones', 'AplicacionController');
    Route::get('aplicaciones/{id}/delete', 'AplicacionController@delete');
    Route::get('aplicaciones/{id}/pdf', 'AplicacionController@pdf')->name('aplicaciones.pdf');
    



    Route::get('/clear_cache', function () {
        Artisan::call('cache:clear');
        //Artisan::call('route:cache');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        return "Cache is cleared";
    });
});
