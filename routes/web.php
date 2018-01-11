<?php

//use App\Events\LinkCreated;
//dd($_SERVER['REMOTE_ADDR']);
Route::get('/', 'Frontend\PagesController@landing');
Route::get('/about', 'Frontend\PagesController@about');
Route::get('/contact', 'Frontend\PagesController@contact');
Route::get('/services', 'Frontend\PagesController@services');
Route::get('/links', 'Frontend\PagesController@link');
Route::get('/links/{id}', 'Frontend\PagesController@countLink');
Route::get('/tags/all', 'Frontend\PagesController@all');
Route::get('/tags/{category}', 'Frontend\PagesController@result');
Route::get('/demos', 'Frontend\PagesController@demo');

// Route::get('/broadcast', function(){
//     $name = Request::input('name');// broadcast/?name=John
//     event(new LinkCreated($name));
//     return 'Done!';
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/adm', 'middleware' => 'auth'], function(){
    Route::get('/login', ['uses' => 'Admin\AuthController@index', 'as' => 'login.admin']);
    Route::post('/login', ['uses' => 'Admin\AuthController@login', 'as' => 'login.admin']);
});

Route::group(['middleware' => 'admin'], function(){
    Route::post('/logout', ['uses' => 'Admin\AuthController@logout', 'as' => 'admin.logout']);
    Route::get('/site-map', 'Admin\SiteMapController@index');
    Route::get('stat/ip/{ip}', 'Admin\StatController@index');
    Route::get('stat/page/{page}', 'Admin\StatController@index');

    Route::resource('admin','Admin\AdminController');//
    Route::post('admin/{id}/update','Admin\AdminController@update');
    Route::get('admin/{id}/delete','Admin\AdminController@destroy');
    Route::get('admin/{id}/deleteMsg','Admin\AdminController@DeleteMsg');

    Route::resource('category','Admin\CategoryController');
    Route::post('category/{id}/update','Admin\CategoryController@update');
    Route::get('category/{id}/delete','Admin\CategoryController@destroy');
    Route::get('category/{id}/deleteMsg','Admin\CategoryController@DeleteMsg');

    Route::resource('link','Admin\LinkController');
    Route::post('link/{id}/update','Admin\LinkController@update');
    Route::get('link/{id}/delete','Admin\LinkController@destroy');
    Route::get('link/{id}/deleteMsg','Admin\LinkController@DeleteMsg');

    Route::resource('stat','Admin\StatController');
    Route::post('stat/{id}/update','Admin\StatController@update');
    Route::get('stat/{id}/delete','Admin\StatController@destroy');
    Route::get('stat/{id}/deleteMsg','Admin\StatController@DeleteMsg');
});
