<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::resource('user', 'UserController');

Route::get('Register', 'GeneralController@singup')->name('register');




// Host Controller

Route::resource('Host', 'HostController');
Route::get('Hroom', 'GeneralController@rooms')->name('hrooms');
Route::resource('usrsinroom', 'UserInRoomController');
// Route::get('searchMember/{id}', 'HostController@searchMember')->name('searchMember');
Route::post('search', 'HostController@search')->name('search');
Route::post('adduser', 'HostController@adduser')->name('adduser');



// Teacher Controller

Route::resource('Teacher', 'TeacherController');


// Teacher Controller
Route::resource('Student', 'StudentController');


// Admin Controller
Route::resource('Admin', 'AdminController');












Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
