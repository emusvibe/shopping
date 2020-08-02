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

Route::get('/', [
'uses' => 'TestController@getIndex',
'as' =>'test.index'
]);

Route::get('/add-to-cart/{id}', [
   'uses' => 'TestController@getAddToCart',
   'as' =>'test.addToCart'
    ]);

Route::get('/reduce/{id}', [
   'uses' => 'TestController@getReduceByOne',
   'as' =>'test.reduceByOne'
    ]);

Route::get('/remove/{id}', [
  'uses' => 'TestController@getRemoveItem',
    'as' =>'test.remove'
    ]);



Route::get('/shopping-cart', [
   'uses' => 'TestController@getCart',
   'as' =>'test.shoppingCart'
   ]);

Route::get('/checkout', [
   'uses' => 'TestController@getCheckout',
   'as' =>'checkout',
   'middleware' => 'auth'
]);
Route::post('/checkout', [
   'uses' => 'TestController@postCheckout',
   'as' =>'checkout',
   'middleware' => 'auth'
]);



Route::group(['prefix'=>'users'], function(){
   Route::group(['middleware' => 'guest'], function(){
      Route::get('/signup', [
         'uses' => 'UserController@getSignup',
         'as' =>'users.signup'
         ]);
   
      Route::post('/signup', [
         'uses' => 'UserController@postSignup',
         'as' =>'users.signup'
          ]);
      
      Route::get('/signin', [
         'uses' => 'UserController@getSignin',
         'as' =>'users.signin'
           ]);
      
      Route::post('/signin', [
        'uses' => 'UserController@postSignin',
         'as' =>'users.signin'
         ]);     

   });

   Route::group(['middleware' => 'auth'], function(){
      Route::get('/profile', [
         'uses' => 'UserController@getProfile',
         'as' =>'users.profile'        
           ]);
        
        Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' =>'users.logout'
           ]);
     });

   });
   
   

