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
    return view('layouts.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/root', 'Temp@init');
Route::get('/volreg', 'Temp@volreg');
Route::get('/list', 'Temp@list');
Route::get('/autofill', 'Temp@autofill');
Route::post('/auto_post','Temp@auto_fill_post')->name('auto_fill_post');
Route::get('/uploadstudent', 'VolunteerController@uploadstudent')->name('uploadstudent');
Route::post('/uploadpoststudent','VolunteerController@uploadpoststudent')->name('uploadpoststudent');
Route::get('/uploadstudent', 'VolunteerController@uploadstudent')->name('uploadstudent');
Route::get('/index','Temp@retind');

Route::post('/auto_fill_form','Temp@autoform')->name('auto_fill_form');

//Routes for admin
Route::get('/admin','AdminController@index')->name('adminindex');
Route::get('/verified','AdminController@verified')->name('adminverified');
Route::get('/school','AdminController@school')->name('school');
Route::get('/volunteers','AdminController@volunteerList')->name('volunteerList');
Route::get('/projectlist','AdminController@projectlist')->name('projectlist');
Route::get('/addteachers','AdminController@addteachers')->name('addteachers');
Route::post('/uploadTeacher','AdminController@uploadTeacher')->name('uploadTeacher');

//Route::get('/project/{id}','AdminController@project')->name('project');
Route::post('/uploadSchool','AdminController@uploadSchool')->name('uploadSchool');
Route::get('/addproject','AdminController@addproject')->name('projectget');
Route::post('/postproject','AdminController@projectpost')->name('projectpost');
Route::get('/approve/{id}','AdminController@approve')->name('approve');
Route::get('/delete/{id}','AdminController@delete')->name('delete');

//Route for donors
Route::post('/donor/paymentpost','DonorController@paymentpost')->name('paymentpost');
Route::post('/paymentsuccess','DonorController@paymentsuccess')->name('paymentsuccess');
Route::post('/paymentfailure','DonorController@paymentfailure')->name('paymentfailure');
Route::get('/viewdonations','DonorController@viewdon')->name('viewdons');
Route::get('/unknownmap','DonorController@unknownmap')->name('unknownmap');

//Routes for members
Route::get('/member', 'MemberController@member');
Route::post('/uploadData', 'MemberController@uploadData')->name('uploadData');

//Route for volunteers
Route::get('/volunteer/details', 'VolunteerController@details')->name('volunteerdetails');
Route::post('/volunteer/postdetails','VolunteerController@postdetails')->name('volunteerpostdetails');
Route::get('/volunteercharts','VolunteerController@volunteercharts')->name('volunteercharts');
Route::get('/attendancecharts','VolunteerController@attendancecharts')->name('attendancecharts');
//Route::get('/disteachers','VolunteerController@teachVol')->name('teachVol');

Route::get('/email','Temp@email');
