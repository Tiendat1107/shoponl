<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Views

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/trang-chu', 'App\Http\Controllers\HomeController@index');

//Danh mục san pham(clients)
Route::get('/danh-muc-san-pham/{cate_id}', 'App\Http\Controllers\CategoryProducts@show_category_home');
Route::get('/chi-tiet-san-pham/{pro_id}', 'App\Http\Controllers\ProductsController@category_details');


//Admin

Route::get('/login', 'App\Http\Controllers\AdminController@index');

Route::get('/admin', 'App\Http\Controllers\AdminController@dashboard');

Route::post('/admin-dashboard', 'App\Http\Controllers\AdminController@login_dashboard');

Route::get('/logout', 'App\Http\Controllers\AdminController@logout');

//Danh mục san pham(admin)
Route::get('/add-category-products', 'App\Http\Controllers\CategoryProducts@add_category_products');

Route::get('/list-category-products', 'App\Http\Controllers\CategoryProducts@list_category_products');

Route::post('/save-category-products', 'App\Http\Controllers\CategoryProducts@save_category_products');
Route::post('/update-category-products/{cate_id}', 'App\Http\Controllers\CategoryProducts@update_category_products');

Route::get('/unactive-cate-pro/{cate_id}', 'App\Http\Controllers\CategoryProducts@unactive_category_products');
Route::get('/active-cate-pro/{cate_id}', 'App\Http\Controllers\CategoryProducts@active_category_products');

Route::get('/edit-category-products/{cate_id}', 'App\Http\Controllers\CategoryProducts@edit_category_products');
Route::get('/remove-category-products/{cate_id}', 'App\Http\Controllers\CategoryProducts@remove_category_products');

//San pham(admin)
Route::get('/add-products', 'App\Http\Controllers\ProductsController@add_products');
Route::get('/list-products', 'App\Http\Controllers\ProductsController@list_products');

Route::post('/save-products', 'App\Http\Controllers\ProductsController@save_products');
Route::post('/update-products/{pro_id}', 'App\Http\Controllers\ProductsController@update_products');

Route::get('/unactive-pro/{pro_id}', 'App\Http\Controllers\ProductsController@unactive_products');
Route::get('/active-pro/{pro_id}', 'App\Http\Controllers\ProductsController@active_products');

Route::get('/edit-products/{pro_id}', 'App\Http\Controllers\ProductsController@edit_products');
Route::get('/remove-products/{pro_id}', 'App\Http\Controllers\ProductsController@remove_products');

//Thuộc Tính(admin)
Route::get('/add-attribute/{pro_id}', 'App\Http\Controllers\AttributeController@add_attribute');
Route::post('/update-attribute/{pro_id}', 'App\Http\Controllers\AttributeController@update_attribute');



