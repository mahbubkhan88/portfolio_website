<?php

use Illuminate\Support\Facades\Route;


//Frontend
Route::get('/', 'HomeController@Index');
















//Backend
Route::get('/dashboard', 'DashboardController@Dashboard');
Route::get('/visitor', 'VisitorController@Visitors');
Route::get('/services', 'ServiceController@Services');
Route::get('/getServicesData', 'ServiceController@getServiceData');