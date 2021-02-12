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

// welocom.bladeへ　直行  初回　Router → 無効へ
// Route::get('/', function () {
//     return view('welcome');
// });

//Controller ( TasksController@index ) を経由して welcome を表示するように
Route::get('/', 'TasksController@index');

// User登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//User 選別
Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['show']]);
    // Route::resource('tasks', 'TasksController', ['only' => ['index','create','store','edit','uodate','destroy']]);
    Route::resource('tasks', 'TasksController', ['only' => ['index','create','store','edit','update','destroy']]);

});


// Login認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


// // TODOの個別詳細Page表示
// Route::get('tasks/{id}', 'TasksController@show');

// // TODOの新規登録を処理（新規登録画面を表示するためのものではない）
// Route::post('tasks', 'TasksController@store');

// // TODOの更新処理（編集画面を表示するためのものではない）
// Route::put('tasks/{id}', 'TasksController@update');

// // TODOを削除
// Route::delete('tasks/{id}', 'TasksController@destroy');

// // index: showの補助Page
// Route::get('tasks', 'TasksController@index');

// // create: 新規作成用のFormPage
// Route::get('tasks/create', 'TasksController@create');

// // edit: 更新用のFormPAge
// Route::get('tasks/{id}/edit', 'TasksController@edit')->name('messages.edit');


Route::get('index', 'TasksController@index');



// Restful RESTful Resource Controller
Route::resource('tasks', 'TasksController');

