<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WordGameController;
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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', function () {
    return view('gameword.gameword');
});
Route::match(['get','post'],'gameword', [WordGameController::class, 'index']);
Route::match(['get','post'],'insert', [WordGameController::class, 'insertword']);
Route::match(['get','post'],'test', [WordGameController::class, 'Test']);
Route::match(['get','post'],'getword', [WordGameController::class, 'getWord'])->name('getword');

//Route::match(['get','post'],'gameword',['as'=>'gameword','uses'=>'WordGameController@index']);

//Route::match(['get','post'],'/getword',['as'=>'getword','uses'=>'WordGameController@getWord']);
//Route::match(['get','post'],'/insert',['as'=>'insert','uses'=>'WordGameController@insertword']);
//
//Route::match(['get','post'],'/test',['as'=>'test','uses'=>'WordGameController@Test']);
//Route::match(['get','post'],'/send',['as'=>'send','uses'=>'WordGameController@Test']);

