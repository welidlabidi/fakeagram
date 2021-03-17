<?php

use App\Mail\NewUserWelcomeMail;
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



Auth::routes();

/* Route::get('/email', function () {
    return new NewUserWelcomeMail();
}); */

Route::post('follow/{user}', 'FollowController@store');


Route::get('/', 'PostsController@index');
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');
Route::post('/postDestroy/{id}', 'PostsController@postDestroy')->name('postDestroy');
Route::delete('/postDestroy/{id}', 'PostsController@postDestroy')->name('postDestroy');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::get('/profile/destroy/{id}', 'ProfilesController@destroy')->name('destroy');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');