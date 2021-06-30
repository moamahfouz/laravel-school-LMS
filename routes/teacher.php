<?php

use App\Http\Controllers\Teacher\StudentController;
use App\Http\Controllers\Teacher\ClassController;
use App\Http\Controllers\Teacher\TaskController;
use App\Http\Controllers\Teacher\MarkController;

Route::group(['namespace' => 'App\Http\Controllers\Teacher'], function() {
    Route::get('/', 'HomeController@index')->name('teacher.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('teacher.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('teacher.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('teacher.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('teacher.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('teacher.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('teacher.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('teacher.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('teacher.verification.notice');
    Route::get('email/verify/{id}/{hash}','Auth\VerificationController@verify')->name('teacher.verification.verify');
});

Route::resource('/students', StudentController::class, ['as'=>'teacherStudent','except' => ['destroy']]);
Route::resource('/classes', ClassController::class, ['as'=>'teacherClass','except' => ['destroy']]);
Route::resource('/tasks', TaskController::class, ['as'=>'teacherClass','except' => ['destroy', 'index']]);
Route::resource('/marks', MarkController::class, ['as'=>'teacherMarks','except' => ['destroy', 'index']]);

