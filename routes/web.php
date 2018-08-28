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
/*
Route::get('/', function () {
    return view('/pages/welcome');
});

Route::get('/', function () {
    return view('about');
});
*/
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/faculty', 'PagesController@faculty');//->middleware('auth');

//Route::get('/', 'PageController@index');

//Route::get('/publications', 'PublicationController@index');
//Route::get('/publications/create', 'PublicationController@create');
//Route::post('/publications/store', 'PublicationController@store');

//Route::get('publications/{$id}', 'PublicationController@show');

//Route::get('publications/{id}', 'PublicationController@show');

route::resource('publications','PublicationController');

route::resource('strands','StrandController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

Route::get('/fetch/strand', 'DataFetchController@fetch_strand_data')->name('fetch.strand');

