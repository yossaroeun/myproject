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
Route::match(['get','post'],'/admin/login', 'AdminController@login');
Route::post('/admin/store_user','AdminController@store');
Route::get('/admin/user_create','AdminController@create');
//Auth::routes();
Route::group(['middleware'=>['auth']],function(){
	Route::get('/logout','AdminController@logout');
	Route::get('/admin/dashboard','AdminController@dashboard');
	Route::get('/admin/setings','AdminController@setings');
	Route::get('/admin/check-pwd','AdminController@chkPassword');
	Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');
	// Route category (admin)
	Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
	Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
	Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
	Route::get('/admin/view-categories','CategoryController@viewCategory');

	// Route products
	Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
	Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
	Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
	Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');
	Route::get('/admin/view-product','ProductsController@viewProduct');
	// Products Attributes Route
	Route::match(['get','post'],'/admin/add-attributes/{id}','ProductsController@addAttributes');
	Route::get('/admin/delete-attributes/{id}','ProductsController@deleteAttributes');
});
//Route::get('/home', 'HomeController@index')->name('home');
