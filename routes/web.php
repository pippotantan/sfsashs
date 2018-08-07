<?php
use App\Publication;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'PageController@index');

Route::get('/publications', 'PublicationController@index');

//Route::get('publications/{$id}', 'PublicationController@show');

Route::get('publications/{id}', 'PublicationController@show');