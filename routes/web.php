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

Route::get('/', 'PagesController@home');


Route::get('/about', 'PagesController@about');
Route::get('/contact', 'TicketsController@create');
Route::post('/contact', 'TicketsController@store');

Route::resource('tickets', 'TicketsController');

Route::post('/comment', 'CommentsController@newComment');

Route::get('users/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('users/register', 'Auth\RegisterController@register');
Route::get('home', 'PagesController@home');
Route::get('users/logout', 'Auth\LoginController@logout');
Route::get('users/login', 'Auth\LoginController@showLoginForm')
->name('login');
Route::post('users/login', 'Auth\LoginController@login');

//Building an admin area
Route::group(
    ['prefix' => 'admin' ,
    'namespace' => 'Admin' ,
    // 'middleware' => 'manager'
],
    function () 
    {
        Route::get('users', [
            'as'=> 'admin.users.index',
            'uses' => 'UsersController@index']);
        Route::get('roles', 'RolesController@index');
        Route::get('roles/create', 'RolesController@create');
        Route::post('roles/create', 'RolesController@store');
        //Assign roles to users
        Route::get('users/{id?}/edit', 'UsersController@edit');
        Route::post('users/{id?}/edit', 'UsersController@update');
        Route::get('/', 'PagesController@home');
        //a new posts
        Route::resource('posts', 'PostsController')
        ->except('show','destroy');
        //Create and view categories
        Route::resource('categories', 'CategoriesController')
        ->only('index','create','store');
    }
);
//Dislay all blog route
Route::get('/blog', 'BlogController@index');
Route::get('/blog/{slug?}', 'BlogController@show');
//Route Language
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'Language\LanguageController@switchLang']);

Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')
->name('login.provider')
//Can be used on other social platforms
//他のソーシャルでもつかえる
->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//画像をアップロード
Auth::routes();
Route::group(['middleware' => 'auth'], function () 
{
    Route::resource('users','UsersController');
    Route::post('avatar', 'UsersController@update_avatar');
});
