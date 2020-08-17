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
	Route::post('/gidearau/asociar','GidearauController@asociarInvestigador')->name('asociarAutor');
	Route::get('/gidearau/borrar/{id}','GidearauController@borrar')->name('borrandoAutor');
	Route::resource('gidearau', 'GidearauController');
	Route::post('/gideliau/asociar','GideliauController@asociarInvestigador')->name('asociarAutorLibro');
	Route::get('/gideliau/borrar/{id}','GideliauController@borrar')->name('borrandoAutorLibro');
	Route::resource('gideliau', 'GideliauController');
	Route::post('/gidesoau/asociar','GidesoauController@asociarInvestigador')->name('asociarAutorSw');
	Route::get('/gidesoau/borrar/{id}','GidesoauController@borrar')->name('borrandoAutorSw');
	Route::resource('gidesoau', 'GidesoauController');
	Route::post('/gidepoau/asociar','GidepoauController@asociarInvestigador')->name('asociarAutorPo');
	Route::get('/gidepoau/borrar/{id}','GidepoauController@borrar')->name('borrandoAutorPo');
	Route::resource('gidepoau', 'GidepoauController');
	Route::post('/gidepaau/asociar','GidepaauController@asociarInvestigador')->name('asociarAutorPa');
	Route::get('/gidepaau/borrar/{id}','GidepaauController@borrar')->name('borrandoAutorPa');
    Route::resource('gidepaau', 'GidepaauController');
    Route::resource('girubpre', 'GirubpreController');
    Route::resource('giproesp', 'GiproespController');
	Route::post('/giproesp/asociar','GiproespController@asociarProducto')->name('asociarProductoEsperado');
	Route::get('/giproesp/borrar/{id}','GiproespController@borrar')->name('borrandoProductoEsperado');
    Route::resource('gidepres', 'GidepresController');
	Route::post('/giproesp/avancePrEs','GiproespController@asociarAvanceProductoEsperado')->name('asociarAvanceProductoEsperado');
	Route::post('/gidepres/crear','GidepresController@crearDetalle')->name('crearDetalle');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('users', 'UsersController', ['except' => ['show']]);
	// Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	// Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	// Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::get('centros/{regional}', 'RegionalesController@darCentros');
Route::get('grupos/{centro}', 'GigruinvController@darGrupos');
Route::get('semilleros/{centro}', 'CentrosFormacionController@darSemileros');
Route::get('investigadores/{grupo}', 'GiinvestController@darInvestigadores');
Route::get('integrantesemillero/{grupo}', 'GiseminvController@darIntegrantesSemillero');
Route::get('lineas/{grupo}', 'GilininvController@darLineas');
Route::get('proyectos/{grupo}', 'GiproinvController@darProyectos');
Route::get('proyecto/{id}', 'GiproinvController@darProyecto')->name('darProyecto');
Route::get('proyecto/investigadores/{id}', 'GiproinvController@darInvestigadoresProyecto')->name('darInvestigadoresProyecto');
Route::get('rubros/{grupo}', 'GirubpreController@darRubros');
Route::get('porcentajeProducto/{id}', 'GiproespController@darPorcentajeProducto');
