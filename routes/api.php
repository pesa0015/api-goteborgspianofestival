<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('years/current', ['uses' => 'YearsController@current', 'middleware' => 'langLogger']);
Route::resource('years', 'YearsController', ['only' => ['index']]);
Route::resource('sponsors', 'SponsorsController', ['only' => ['index']]);
Route::get('program/{year}/{slug}', 'EventPagesController@show');
Route::resource('news', 'NewsController', ['only' => ['index']]);
Route::resource('boardmembers', 'BoardMembersController', ['only' => ['index']]);

// Applications
Route::resource('applications', 'ApplicationsController', ['only' => ['store']]);

// Contact
Route::post('contact', 'ContactsController@contactUs');

// Membership
Route::post('member', 'ContactsController@beMember');
