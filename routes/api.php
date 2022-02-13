<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



route::post('/login','UsersController@Login');

route::post('/register','UsersController@register');

route::get('/area','shopsController@getAreas');

route::get('/order','OrdersController@getOrdersAndroid');

route::post('/order','OrdersController@postOrders');

route::post('/items','shopsController@getItemInsideShop');

route::get('/allshops','shopsController@getAllShops');

route::post('/itemDesc','shopsController@itemDetails');

route::post ('/areaShop','shopsController@areaShop');

route::get('/area','shopsController@getAreas');

route::post('/userinfo','UsersController@userInfo');

route::post('/itemrate','ItemsController@updateRate');

route::post('/shoprate','shopsController@updateRate');

route::post('/addComment','ItemsController@addComment');

route::post('/getComment','ItemsController@getComment');