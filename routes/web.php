<?php

Route::view('/', 'pages/index');
Route::view('/about', 'pages/about');
Route::view('/contact', 'pages/contact');
Route::view('/services', 'pages/services');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/links', 'HomeController@link');
Route::get('/tags/{category}', 'HomeController@result');
Route::get('/demos', 'HomeController@demo');

Route::group(['prefix' => '/adm'], function(){
    Route::get('/login', [
        'uses' => 'AdminController@getLogin',
        'as' => 'login.admin'
    ]);
    Route::post('/login', [
        'uses' => 'AdminController@postLogin',
        'as' => 'login.admin'
    ]);
});

Route::group(['middleware' => 'admin'], function(){

    Route::resource('admin','\App\Http\Controllers\AdminController');//
    Route::post('admin/{id}/update','\App\Http\Controllers\AdminController@update');
    Route::get('admin/{id}/delete','\App\Http\Controllers\AdminController@destroy');
    Route::get('admin/{id}/deleteMsg','\App\Http\Controllers\AdminController@DeleteMsg');

    Route::post('/logout', [
      'uses' => 'AdminController@getLogout',
      'as' => 'admin.logout'
    ]);

    Route::get('/site-map', 'AdminController@siteMap');

    Route::resource('category','\App\Http\Controllers\CategoryController');
    Route::post('category/{id}/update','\App\Http\Controllers\CategoryController@update');
    Route::get('category/{id}/delete','\App\Http\Controllers\CategoryController@destroy');
    Route::get('category/{id}/deleteMsg','\App\Http\Controllers\CategoryController@DeleteMsg');

    Route::resource('link','\App\Http\Controllers\LinkController');
    Route::post('link/{id}/update','\App\Http\Controllers\LinkController@update');
    Route::get('link/{id}/delete','\App\Http\Controllers\LinkController@destroy');
    Route::get('link/{id}/deleteMsg','\App\Http\Controllers\LinkController@DeleteMsg');

});
