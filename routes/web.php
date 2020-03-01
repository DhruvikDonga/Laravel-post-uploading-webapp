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

Route::get('/', 'PagesController@index');
/*
Route::get('/hello', function () {
    //return view('welcome');
    return '<h1>Hello world</h1>';
});
*/
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');

Route::resource('posts','PostsController');
Route::resource('shops','SubscribeController');

Route::post('/like',[
'uses' => 'PostsController@postLikePost',
'as' => 'like'
]);
/*
Route::get('/users/{id}/{name}', function($id,$name){
	return 'This is user '.$name.' with an id of '.$id;
});*/
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');