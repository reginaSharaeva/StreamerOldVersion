<?php
Route::group(['middleware' => 'guest'], function () {
    Route::post('/login', "LoginController@login");
    Route::post('/register', "RegisterController@register");
});

Route::group(['middleware' => 'auth.custom'], function () {
    Route::get('/profile', "PanelController@profilePage");
    Route::get('/logout', "LoginController@logout");
    Route::get('/getUserInfo', "UserController@getInfoAboutGuardUser");
    Route::post('/updateUser', "UserController@updateGuardUser");
    Route::post('/addNewCamera', "CameraController@addNewCamera");
    Route::post('/updateCamera', "CameraController@updateCamera");
    Route::get('/deleteCamera/{id}', "CameraController@deleteCamera");
    Route::get('/getCameras', "CameraController@getCameras");
});

Route::get('/camera/video/{key}', "CameraController@getCameraPage");
Route::get('/test/{id}', "CameraController@testRunCam");
Route::get('/', "LoginController@showLoginForm");
Route::get('/file', "PanelController@getFile");