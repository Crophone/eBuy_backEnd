<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    //首页
    $router->get('/', 'HomeController@index');
    $router->get('/goods', 'GoodController@index');

    // $router->get('/{id}','OrderController@edit');
    // $router->get('/','OrderController@index');
    // // $router->get('auth/logout',)
    // $router->get('/auth/logout','OrderController@index');


    // $router->post('/order/createNewOrder', 'OrderController@newOrder');
    // $router->get('/order/createNewOrder', 'OrderController@create');
    // $router->get('/user/getUser', 'UserController@requireAllUser');
    // $router->get('/good/getAllGoods', 'GoodController@requireAllGood');
    // $router->get('/good/getGoods/{id?}', 'GoodController@requireOneGood');
    // $router->post('/good/addOrder','GoodController@addOneOrder');
    // $router->get('/good/testPost','GoodController@testPost');

    //     Route::post('/order/{name?}',['as'=>'center',function($name=null){
//         print()
//     return 'User-name-' .$name;
// }])->where('name','[A-Za-z]+');
    // $router->post('/order/createNewOrder', 'OrderController@newOrder');
    // $router->resource('order', OrderController::class);
    $router->resource('users', UserController::class);
    $router->resource('goods',GoodController::class);
    $router->resource('orders',OrderController::class);
    $router->resource('myusers', MyUserController::class);
    // $router->resource('shopping_list',OrderController::class);
 
});
