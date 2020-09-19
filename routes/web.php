<?php

Route::get('/', function () {
    return view('index');
})->name('index');
Route::middleware('auth')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/','user\UserController@index');
        Route::get('/my_profile','user\UserController@index')->name('my_profile');
        Route::get('/edit_profile', 'user\UserController@view_edit_profile')->name('view_edit_profile');
        Route::post('/edit_profile', 'user\UserController@edit')->name('edit_profile');
        Route::get('/MyProjects', 'user\ProjectController@index')->name('my_projects');
        Route::get('/ViewEditProject/{id}', 'user\ProjectController@view_edit_project')->name('view_edit_my_project');
        Route::post('/EditProject/{id}', 'user\ProjectController@edit')->name('edit_my_project');
        Route::get('/deleteProject/{id}', 'user\ProjectController@destroy')->name('delete_my_project');
        Route::get('/AddProject', 'user\ProjectController@view_add_project')->name('view_add_my_project');
        Route::post('/addProject', 'user\ProjectController@store')->name('add_my_project');
        Route::get('/DeleteImageProject/{id}', 'user\ProjectController@destroy_image_project')->name('delete_image_my_project');
});
    Route::prefix('admin')->group(function () {
        Route::get('/', 'admin\UserController@index');
        Route::get('/ManagementUsers', 'admin\UserController@index')->name('management_users');
        Route::get('/ViewUser/{id}', 'admin\UserController@show')->name('view_user');
        Route::get('/ViewEditUser/{id}', 'admin\UserController@view_edit_user')->name('view_edit_user');
        Route::post('/EditUser/{id}', 'admin\UserController@edit')->name('edit_user');
        Route::get('/ViewAddUser', 'admin\UserController@view_add_user')->name('view_add_user');
        Route::post('/AddUser', 'admin\UserController@store')->name('add_user');
        Route::get('/DeleteUser/{id}', 'admin\UserController@destroy')->name('delete_user');
        Route::get('/ViewEditProject/{id}', 'admin\ProjectController@view_edit_project')->name('view_edit_project');
        Route::get('/ManagementProjects', 'admin\ProjectController@index')->name('management_projects');
        Route::post('/EditProject/{id}', 'admin\ProjectController@edit')->name('edit_project');
        Route::get('/deleteProject/{id}', 'admin\ProjectController@destroy')->name('delete_project');
        Route::get('/AddProject', 'admin\ProjectController@view_add_project')->name('view_add_project');
        Route::post('/addProject', 'admin\ProjectController@store')->name('add_project');
        Route::get('/delete_profile_project/{id}', 'admin\ProjectController@destroy_profile_project')->name('delete_profile_project');
        Route::get('/DeleteImageProject/{id}', 'admin\ProjectController@destroy_image_project')->name('delete_image_project');
        Route::get('/ManagementMessages', 'admin\ContactController@index')->name('management_messages');
        Route::get('/DeleteMessage/{id}', 'admin\ContactController@destroy')->name('delete_message');
        });
});
Route::get('/login','Auth\LoginController@login')->name('login');
Route::post('/authenticate','Auth\LoginController@authenticate')->name('authenticate');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/404', function () {
    return view('error-404');
})->name('404');
Route::get('/403', function () {
    return view('error-403');
})->name('403');

Route::get('/contact','ContactController@store')->name('contact');
