<?php

//use App\Events\LinkCreated;
//dd($_SERVER['REMOTE_ADDR']);
Route::namespace('Frontend')->group(function(){
    Route::get('/', 'PagesController@landing');
    Route::get('/about', 'PagesController@about');
    Route::get('/contact', 'PagesController@contact');
    Route::get('/services', 'PagesController@services');
    Route::get('/links', 'PagesController@link');
    Route::get('/links/{id}', 'PagesController@countLink');
    Route::get('/tags/all', 'PagesController@all');
    Route::get('/tags/{category}', 'PagesController@result');
    Route::get('/demos', 'PagesController@demo');
});

// Route::get('/broadcast', function(){
//     $name = Request::input('name');// broadcast/?name=John
//     event(new LinkCreated($name));
//     return 'Done!';
// });

Auth::routes();
Route::name('home')->get('/home', 'Frontend\HomeController@index');

Route::prefix('adm')->namespace('Admin')->middleware('auth')->group(function(){
    Route::name('login.admin')->get('/login', 'AuthController@index');
    Route::name('login.admin')->post('/login', 'AuthController@login');
});

Route::namespace('Admin')->middleware('admin')->group(function(){
    Route::name('admin.logout')->post('/logout', 'AuthController@logout');
    Route::get('/site-map', 'SiteMapController@index');
    Route::get('stat/ips/{ip?}','StatController@getIps');
    Route::get('stat/pages', 'StatController@getPages');
    Route::get('stat/ip/{id?}','IpController@index');
    Route::get('admin/notifications/{id}', 'AdminController@getNotifications');
    Route::delete('admin/notifications/{id}', 'AdminController@markNotifications');

    Route::resource('admin','AdminController');//
    Route::post('admin/{id}/update','AdminController@update');
    Route::get('admin/{id}/delete','AdminController@destroy');
    Route::get('admin/{id}/deleteMsg','AdminController@DeleteMsg');

    Route::resource('category','CategoryController');
    Route::post('category/{id}/update','CategoryController@update');
    Route::get('category/{id}/delete','CategoryController@destroy');
    Route::get('category/{id}/deleteMsg','CategoryController@DeleteMsg');

    Route::resource('link','LinkController');
    Route::post('link/{id}/update','LinkController@update');
    Route::get('link/{id}/delete','LinkController@destroy');
    Route::get('link/{id}/deleteMsg','LinkController@DeleteMsg');

    Route::resource('stat','StatController');
    Route::post('stat/{id}/update','StatController@update');
    Route::get('stat/{id}/delete','StatController@destroy');
    Route::get('stat/{id}/deleteMsg','StatController@DeleteMsg');

    Route::get('stat/{ip}/deleteIp','StatController@destroyIp');

    Route::resource('ip','IpController');
    Route::post('ip/{id}/update','IpController@update');
    Route::get('ip/{id}/delete','IpController@destroy');
    Route::get('ip/{id}/deleteMsg','IpController@DeleteMsg');

    Route::resource('page','PageController');
    Route::post('page/{id}/update','PageController@update');
    Route::get('page/{id}/delete','PageController@destroy');
    Route::get('page/{id}/deleteMsg','PageController@DeleteMsg');

    Route::resource('notification','NotificationController');
    Route::post('notification/{id}/update','NotificationController@update');
    Route::get('notification/{id}/delete','NotificationController@destroy');
    Route::get('notification/{id}/deleteMsg','NotificationController@DeleteMsg');
});
