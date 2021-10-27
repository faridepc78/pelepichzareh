<?php

use Illuminate\Support\Facades\Route;


/*START ADMIN*/

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth', 'throttle:50,1'],
    'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::patch('profile', 'ProfileController@update')->name('update_profile');

    Route::resource('sliders', 'SliderController')->except('show');

    Route::get('products/categories','ProductController@c_index')->name('products.c_index');
    Route::get('products/categories/create','ProductController@c_create')->name('products.c_create');
    Route::post('products/categories','ProductController@c_store')->name('products.c_store');
    Route::get('products/categories/edit/{category_id}','ProductController@c_edit')->name('products.c_edit');
    Route::patch('products/categories/update/{category_id}','ProductController@c_update')->name('products.c_update');
    Route::delete('products/categories/destroy/{category_id}','ProductController@c_destroy')->name('products.c_destroy');
    Route::resource('products', 'ProductController')->except('show');

    Route::get('projects/categories','ProjectController@c_index')->name('projects.c_index');
    Route::get('projects/categories/create','ProjectController@c_create')->name('projects.c_create');
    Route::post('projects/categories','ProjectController@c_store')->name('projects.c_store');
    Route::get('projects/categories/edit/{category_id}','ProjectController@c_edit')->name('projects.c_edit');
    Route::patch('projects/categories/update/{category_id}','ProjectController@c_update')->name('projects.c_update');
    Route::delete('projects/categories/destroy/{category_id}','ProjectController@c_destroy')->name('projects.c_destroy');
    Route::resource('projects', 'ProjectController')->except('show');

    Route::get('posts/categories','PostController@c_index')->name('posts.c_index');
    Route::get('posts/categories/create','PostController@c_create')->name('posts.c_create');
    Route::post('posts/categories','PostController@c_store')->name('posts.c_store');
    Route::get('posts/categories/edit/{category_id}','PostController@c_edit')->name('posts.c_edit');
    Route::patch('posts/categories/update/{category_id}','PostController@c_update')->name('posts.c_update');
    Route::delete('posts/categories/destroy/{category_id}','PostController@c_destroy')->name('posts.c_destroy');
    Route::get('posts/media/{post_id}', 'PostController@m_index')->name('posts.m_index');
    Route::post('posts/media/{post_id}', 'PostController@m_store')->name('posts.m_store');
    Route::delete('posts/media/{post_id}/{id}/destroy', 'PostController@m_destroy')->name('posts.m_destroy');
    Route::resource('posts', 'PostController')->except('show');

    Route::get('contacts', 'ContactController@index')->name('contacts.index');
    Route::get('contacts/single/{id}', 'ContactController@single')->name('contacts.single');

});

/*END ADMIN*/


/*START AUTH*/

Route::group(['prefix' => '/', 'middleware' => ['web', 'throttle:50,1'],
    'namespace' => 'App\Http\Controllers\Auth'], function () {

    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');

    Route::any('logout', 'LoginController@logout')->name('logout')->middleware('auth');

});

/*END AUTH*/


/*START SITE*/

Route::group(['prefix' => '/', 'middleware' => ['web', 'throttle:50,1'],
    'namespace' => 'App\Http\Controllers\Site'], function () {

    Route::get('/', 'MainController@home')->name('home');

    Route::get('about-us', 'MainController@about_us')->name('about-us');

    Route::get('contact-us', 'MainController@contact_us')->name('contact-us');
    Route::post('contact-us', 'MainController@contact_us_send')->name('contact-us-send');

    Route::get('products/category/{slug}','MainController@products_category')->name('products.category');

    Route::get('projects/category/{slug}','MainController@projects_category')->name('projects.category');

    Route::get('posts/category/{slug}','MainController@posts_category')->name('posts.category');
    Route::get('post/{slug}','MainController@post')->name('post');

});

/*END SITE*/
