<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::group(['middleware' => 'auth:api'], function() {
//doctor
Route::get('doctor/all','doctors@get_all_doctors');
Route::post('doctor/new','doctors@create');
Route::get('doctor/profile/{{id}}','doctors@get_profile');

Route::get('doctor/patients/{{id}}','patients@get_patients');
Route::get('doctor/patients/all','patients@get_patients_all');
Route::post('doctor/add/patient/{{did}}/{{pid}}');
//patients
Route::post('patient/','patients@create');
Route::get('patient/profile/{{id}}','patients@get_profile');
Route::get('patient/diagnosis/{{id}}','diagnosis@get_diagnosis_pat');

//diagnosis
Route::post('diagnosis/create','diagnosis@add');
Route::get('diagnosis/doctor/{{id}}','diagnosis@get_diagnosis_doctor');
Route::get('diagnosis/{{id}}','diagnosis@get_diagnosis');
Route::delete('diagnosis/delete/{{id}}','diagnosis@del_diagnosis');

});