<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('home', 'HomeController');


/*
 * Register and Login testing for test permissions
 */
Route::get('/register', 'RegistrationController@create')->name('user.reg');
Route::post('register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('user.log');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy')->name('user.logout');


/*Articles site*/
//Route::resource('article', 'articleController')->middleware(['permission' => auth()->user()]);

Route::group(['prefix' => 'article/'], function (){
   Route::get('create', 'articleController@create')->name('article.create')->middleware('permission:write post');
   Route::get('{article}/edit', 'articleController@edit')->name('article.edit')->middleware('permission:edit post');
   Route::post('article', 'articleController@store')->name('article.store')->middleware('permission:write post');
});