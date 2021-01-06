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
Route::resource('hrooms', 'RoomController');
Route::get('hrooms/teachers/{id}', 'RoomController@teachersview')->name('teachersview');
Route::get('hrooms/students/{id}', 'RoomController@studentsview')->name('studentsview');
Route::get('hrooms/memberrequest/{id}', 'RoomController@memberrequest')->name('memberrequest');
Route::get('hrooms/invitedmember/{id}', 'RoomController@invitedmember')->name('invitedmember');
Route::get('hrooms/invitemember/{id}', 'RoomController@invitemember')->name('invitemember');
Route::get('hrooms/confirmreq/{rid}*&682*&200*&{uid}', 'RoomController@confirmreq')->name('confirmreq');
Route::get('hrooms/removereq/{rid}*&279*&404*&{uid}', 'RoomController@removereq')->name('removereq');
Route::resource('usrsinroom', 'UserInRoomController');
// Route::get('searchMember/{id}', 'HostController@searchMember')->name('searchMember');
Route::post('search', 'HostController@search')->name('search');
Route::post('adduser', 'HostController@adduser')->name('adduser');
Route::post('hrooms/inviteuser', 'RoomController@inviteuser')->name('inviteuser');
// Route::post('removemember', 'RoomController@removemember')->name('removemember');



// Teacher Controller

Route::resource('Teacher', 'TeacherController');
Route::resource('trooms', 'TroomController');
Route::get('trooms/teachers/{id}', 'TroomController@tteachersview')->name('tteachersview');
Route::get('trooms/students/{id}', 'TroomController@tstudentsview')->name('tstudentsview');
Route::post('trooms/joinroom', 'TroomController@joinroom')->name('joinroom');
Route::get('roomreq', 'TroomController@roomreq')->name('roomreq');
Route::get('reqrooms', 'TroomController@reqrooms')->name('reqrooms');
Route::get('roomreqcancel/{rid}', 'TroomController@roomreqcancel')->name('roomreqcancel');
Route::get('roomreqconfirm/{rid}', 'TroomController@roomreqconfirm')->name('roomreqconfirm');
Route::get('trooms/invitemember/{id}', 'TroomController@tinvitemember')->name('tinvitemember');



// Teacher Controller
Route::resource('Student', 'StudentController');


// Admin Controller
Route::resource('Admin', 'AdminController');












Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
