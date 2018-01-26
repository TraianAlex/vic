<?php

//dd($_SERVER['REMOTE_ADDR']);

// Route::get('/see-email', function(){
//     $admin = App\Admin::first();
//     return new App\Mail\LinkCreated($admin);
// });
// DB::listen(function($query){
//     Log::info($query->sql);
// });

Auth::routes();

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

Route::namespace('Frontend')->group(function(){
    Route::name('home')->get('/home', 'HomeController@index');
    Route::get('/loadgrid', 'PagesController@loadGrid');
    //Route::post('/savedraw', 'PagesController@saveDraw');
    Route::post('/send', 'PagesController@sendEmail');
    Route::get('/links', 'PagesController@link');
    Route::get('/links/{id}', 'PagesController@countLink');
    Route::get('/tags/all', 'PagesController@all');
    Route::get('/tags/{category}', 'PagesController@result');
    Route::get('/{page?}', 'PagesController');
});
