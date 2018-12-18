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

//获取user_id
Route::post('/users/getid','MyUserController@getid');

//收货人联系信息
Route::post('/contact_infos','ContactInfosController@change');
Route::get('/contact_infos/{user_id}','ContactInfosController@get');


//购物车1条记录
Route::post('/shopping_lists/one', 'ShoppingListsController@insertone');
//购物车多条记录
Route::post('/shopping_lists/many', 'ShoppingListsController@insertmany');

//获取购物车信息
Route::get('/shopping_lists/{user_id}', 'ShoppingListsController@one');


//获取订单和订单详情
Route::get('/order_lists/{user_id}', 'OrderListController@get');
Route::get('/orders/{user_id}/{order_id} ', 'OrderController@get');



//配合以添加商品
Route::get('/goods/form', 'GoodController@form');
Route::post('/goods/create','GoodController@create');
Route::post('/form-good','GoodController@create');

Route::get('public/images/{image}','GoodController@image');

//滑块
Route::get('/sliders','GoodController@goodsliders');

//下单
Route::post('/orders/create','OrderController@create');
Route::post('/order_lists/create', 'OrderListController@create');

Route::post('/orders','OrderController@create');



Route::get('/users', 'UserController@all');

// Route::get('/orders/{order_id}', 'OrderController@one');

Route::get('/goods', 'GoodController@all');

// Route::get('/orders/{user_id}','OrderController@all');//前端获取该用户所有订单

Route::get('/carts/{user_id}', 'ShoppingListsController@one');

