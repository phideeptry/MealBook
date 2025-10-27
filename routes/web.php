<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('menu-items.index');
});

Route::resource('menu-items', 'MenuItemController');
Route::resource('employees', 'EmployeeController');
Route::resource('dining-tables', 'DiningTableController');
Route::resource('reservations', 'ReservationController');
