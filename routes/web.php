<?php

use Illuminate\Support\Facades\Route;


//Frontend
Route::get('/', 'HomeController@Index');
















//Backend
Route::get('/dashboard', 'DashboardController@Dashboard');