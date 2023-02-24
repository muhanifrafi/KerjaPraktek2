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
Route::group(['middleware' => 'sessionTimeout'], function () {
Route::get('/', 'HomeController@index')->name('home');
Route::post('/login', 'LoginController@login')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');
Route::get('/loap', 'LoapIndexController@index2')->name('loap.index2');
Route::get('TmgeneralPackage', 'TmgeneralPackageController@index');
Route::get('/fixed_wing', 'FixedWingController@index')->name('fixed');
Route::get('/statisfaction', 'StatisfactionController@index');
Route::get('/rotary_wing', 'RotaryWingController@index');
Route::get('/stocks', 'StockController@index');
Route::get('/stockindex', 'StockController@index2');
Route::get('/adam', 'AdamController@index');
Route::get('/adamindex', 'AdamController@index2');
Route::get('/ram', 'RamController@index');
Route::get('/warranty_terms', 'WarrantyController@index');
Route::get('/ietm', 'IetmController@index');
Route::get('/howtoorder', 'HowtoorderController@index');
Route::get('/customer', 'CustomerController@index');
Route::get('/sb+index', 'ServiceBulletinController@index');
Route::get('/sb', 'ServiceBulletinController@index2');
Route::get('/loap+index', 'LoapIndexController@index');
Route::get('/loap_index', 'LoapIndexController@index2');
Route::get('/certificate_detail-{id}-{certificate}', 'CertificateController@show');
Route::get('/training_detail-{id}-{plane}', 'NavController@show');
Route::get('/mro-{i_id_mro}-{mro}', 'NavController@show2');
Route::get('/mro_detail-{i_id_mrodtl}-{mrodtl}', 'NavController@show3');
Route::get('/management-representative', 'ManagementRController@index');
Route::get('/detail-{id}-{fixed}', 'FixedWingController@show');
Route::get('/gallery', 'GalleryController@index');
Route::get('/loap+index', 'LoapIndexController@index')
    ->name('layouts.services.loap');
Route::get('/project', 'ProjectController@index')
    ->name('layouts.status.project');
Route::get('/fleet', 'FleetController@index')
    ->name('layouts.status.fleet');
Route::get('/certificate', 'CertificateController@index')
    ->name('layouts.certificate.certificate');
});
