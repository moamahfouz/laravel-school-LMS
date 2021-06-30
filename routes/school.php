<?php
use App\Http\Controllers\School\TeacherController;
use App\Http\Controllers\School\StudentController;
use App\Http\Controllers\School\ClassController;
Route::group(['namespace' => 'App\Http\Controllers\School'], function() {
    Route::get('/', 'HomeController@index')->name('school.dashboard');
    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('school.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('school.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('school.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('school.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('school.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('school.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('school.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('school.verification.notice');
    Route::get('email/verify/{id}/{hash}','Auth\VerificationController@verify')->name('school.verification.verify');
});



Route::resource('/teachers', TeacherController::class, ['as'=>'schoolTeacher','except' => ['destroy']]);
Route::get('/teachers/del/{id}', [TeacherController::class, 'destroy']);


Route::resource('/students', StudentController::class, ['as'=>'schoolStudent','except' => ['destroy']]);
Route::get('/students/del/{id}', [StudentController::class, 'destroy']);


Route::resource('/classes', ClassController::class, ['as'=>'schoolClass','except' => ['destroy']]);
Route::get('/classes/del/{id}', [ClassController::class, 'destroy']);





