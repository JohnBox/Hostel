<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
  'livers' => 'LiverController',
  'rooms' => 'RoomController',
  'violations' => 'ViolationController',
  'payments' => 'PaymentController',
  'reports' => 'ReportController',
  'settings' => 'SettingController',
  '' => 'HomeController',
]);
