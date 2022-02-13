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



//for admin
route::get('/index','UsersController@index');
route::get('/login','UsersController@getlogin');
route::post('/login','UsersController@postlogin');


route::get('/logout','UsersController@postlogout');
route::post('/logout','UsersController@postlogout');



route::get('confirm/{id}','OrdersController@updateOrder')->name('confirm');

route::get('/count','OrdersController@count');


route::get('/admin',function(){
return view('admin.index');
});

route::get('/con',function(){
    return view ('admin.contact');
});

route::prefix('order')->group(function(){
    route::get('/o','OrdersController@getOrders')->name('order.o');
    route::get('/add','OrdersController@add')->name('order.add');
    route::post('/add','OrdersController@add')->name('order.add');
    route::get('/update/{id}','OrdersController@update')->name('order.update');
    route::post('/update/{id}','OrdersController@update')->name('order.update');
    route::get('delete/{id}','OrdersController@delete')->name('order.delete');
    route::get('/details/{id}','OrdersController@details')->name('order.details');
    });
    

    route::prefix('item')->group(function(){
        route::get('/i','ItemsController@getItems')->name('item.o');
        route::get('/add','ItemsController@add')->name('item.add');
        route::post('/add','ItemsController@add')->name('item.add');
        route::get('/update/{id}','ItemsController@update')->name('item.update');
        route::post('/update/{id}','ItemsController@update')->name('item.update');
        route::get('delete/{id}','ItemsController@delete')->name('item.delete');
        route::get('/details/{id}','ItemsController@details')->name('item.details');
        });
        



        route::prefix('shop')->group(function(){
            route::get('/i','shopsController@getShops')->name('shop.o');
            route::get('/add','shopsController@add')->name('shop.add');
            route::post('/add','shopsController@add')->name('shop.add');
            route::get('/update/{id}','shopsController@update')->name('shop.update');
            route::post('/update/{id}','shopsController@update')->name('shop.update');
            route::get('delete/{id}','shopsController@delete')->name('shop.delete');
            route::get('/details/{id}','shopsController@details')->name('shop.details');
            });
            
    


            route::prefix('shopowner')->group(function(){
                route::get('/i','ShopownersController@getShops')->name('shopowner.o');
                route::get('/add','ShopownersController@add')->name('shopowner.add');
                route::post('/add','ShopownersController@add')->name('shopowner.add');
                route::get('/update/{id}','ShopownersController@update')->name('shopowner.update');
                route::post('/update/{id}','ShopownersController@update')->name('shopowner.update');
                route::get('delete/{id}','ShopownersController@delete')->name('shopowner.delete');
                route::get('/details/{id}','ShopownersController@details')->name('shopowner.details');
                });
                
