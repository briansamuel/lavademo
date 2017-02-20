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
    return view('welcome');
});
Route::get('/chitiet-{id}','NewsController@getDetailAction');
Route::get('/demo/', function () {
    return view('welcome');
});
Route::get('/news-{id}', 'NewsController@test');
Route::get('/about','NewsController@about');
//Route::resource('articles', 'ArticlesController');


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/bai-viet', 'AdminController@listarticle');
Route::get('/admin/them-bai-viet', 'AdminController@addarticle');
Route::post('/admin/articles', 'ArticlesController@store');
// Danh mục Route
Route::get('/admin/danh-muc', 'AdminController@listcategory');
Route::get('/admin/them-danh-muc', 'AdminController@addcategory');
Route::post('/admin/categories', 'CategoriesController@addcategory');
