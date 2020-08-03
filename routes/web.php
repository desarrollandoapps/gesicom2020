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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');

	Route::resource('gigruinv', 'GigruinvController');
	Route::resource('gicapsem', 'GicapsemController');
	Route::resource('giseminv', 'GiseminvController');
	Route::resource('gilinpro', 'GilinproController');
	Route::resource('giproinv', 'GiproinvController');
	Route::resource('gisemill', 'GisemillController');
	Route::resource('gilininv', 'GilininvController');
	Route::resource('giinvest', 'GiinvestController');
	Route::resource('giponinv', 'GiponinvController');
	Route::resource('giartinv', 'GiartinvController');
	Route::resource('gilibinv', 'GilibinvController');
	Route::resource('gipatinv', 'GipatinvController');
	Route::resource('gisofinv', 'GisofinvController');
	Route::post('/gidetinv/asociar','GidetinvController@asociarInvestigador')->name('asociarInvestigador');
	Route::get('/gidetinv/borrar/{id}','GidetinvController@borrar')->name('borrando');
	Route::resource('gidetinv', 'GidetinvController');
});

// Route::group(['middleware' => 'auth'], function () {
// 	Route::resource('user', 'UserController', ['except' => ['show']]);
// 	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
// 	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
// 	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
// });

Route::get('centros/{regional}', 'RegionalesController@darCentros');
Route::get('grupos/{centro}', 'GigruinvController@darGrupos');
Route::get('semilleros/{centro}', 'CentrosFormacionController@darSemileros');
Route::get('investigadores/{grupo}', 'GiinvestController@darInvestigadores');
Route::get('lineas/{grupo}', 'GilininvController@darLineas');
Route::get('proyectos/{grupo}', 'GiproinvController@darProyectos');
