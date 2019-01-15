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

// Start Admin Routes


Route::group(['middleware'  =>  ['web','admin']],function(){

    // Admin
    Route::get('/adminpanel','AdminController@index');

    // Admin Function In Users
    Route::resource('adminpanel/users','UserController');
    Route::get('adminpanel/users/{id}/delete','UserController@destroy');
    Route::get('adminpanel/users/data','UserController@anyData');

    // Admin Function In SiteSettings
    Route::get('/adminpanel/sitesettings','SiteSettingController@index');
    Route::get('/adminpanel/sitesettings/create','SiteSettingController@create');
    Route::post('/adminpanel/sitesettings','SiteSettingController@store');
    Route::patch('/adminpanel/sitesettings','SiteSettingController@update');

    // Admin Function In Buildings
    Route::resource('/adminpanel/buildings','BuildingController');
    Route::get('adminpanel/buildings/{id}/delete','BuildingController@destroy');

    // Admin Function In Contact Messages
    Route::resource('adminpanel/contact','ContactController');
    Route::get('adminpanel/contact/{id}/delete','ContactController@destroy');
    
});


//Route::get('/adminpanel','AdminController@index')->middleware('web','admin');

// End Admin Routes

// Start Website Routes

Route::get('/all-buildings','BuildingController@getAllApprove');
Route::get('rent/{rent}','BuildingController@Rent');
Route::get('type/{type}','BuildingController@Type');
Route::get('search','BuildingController@search');
Route::get('/all-buildings/{id}','BuildingController@show');
Route::get('/contact', 'ContactController@route');
Route::post('/contact', 'ContactController@store');
Route::get('/user/buildings/create','BuildingController@UserCreate');
Route::post('/user/buildings/create','BuildingController@UserStore');
Route::get('/user/{id}/unappbuildings','BuildingController@UserBuildsUnApprove')->middleware('auth');
Route::get('/user/{id}/appbuildings','BuildingController@UserBuilds')->middleware('auth');
Route::get('/profile/{id}/edit','UserController@editProfile')->middleware('auth');
Route::patch('/profile/{id}','UserController@updateProfile')->middleware('auth');
Route::get('/user/building/{id}/edit','BuildingController@UserEditBuilding')->middleware('auth');
Route::patch('/user/building/{id}','BuildingController@UserUpdateBuilding')->middleware('auth');

//Route::get('/all-buildings/user/create','BuildingController@show');
// End Website Routes




Route::get('/', function () {
    $noroute = '';
    return view('welcome')->with('noroute',$noroute);
})->name('welcoming');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
