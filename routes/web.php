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

Route::get('/tickets', 'TicketsController@index');
Route::get('/ticket/{slug?}', 'TicketsController@show');
Route::get('/ticket/{slug?}/edit', 'TicketsController@edit');
Route::post('/ticket/{slug?}/edit', 'TicketsController@update');
Route::post('/ticket/{slug?}/delete', 'TicketsController@destroy');

Route::post('/comment', 'CommentsController@newComment');
//Auth::routes();

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
    function () {
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
        Route::get('posts', 'PostsController@index');
        Route::get('posts/create', 'PostsController@create');
        Route::post('posts/create', 'PostsController@store');
        Route::get('posts/{id?}/edit', 'PostsController@edit');
        Route::post('posts/{id?}/edit', 'PostsController@update');
        //Create and view categories
        Route::get('categories', 'CategoriesController@index');
        Route::get('categories/create', 'CategoriesController@create');
        Route::post('categories/create', 'CategoriesController@store');
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


