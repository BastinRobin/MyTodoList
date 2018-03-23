<?php

use Illuminate\Http\Request;
use App\ContactUs;
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

Route::get('/',  function() {

		return view('welcome');
});


Auth::routes();

Route::get('/tasks', 'TodoController@index')->name('get_tasks');
Route::post('/tasks', 'TodoController@create');
Route::get('/tasks/done/{task_id}', 'TodoController@done');
Route::get('/tasks/undo/{task_id}', 'TodoController@undo');
Route::get('/tasks/delete/{task_id}', 'TodoController@delete');
Route::get('/tasks/edit/{task_id}', 'TodoController@edit');
Route::post('/tasks/edit/{task_id}', 'TodoController@update');






Route::get('/home', function() {
		return redirect('/tasks');
});

// Route::get('/home', 'HomeController@index')->name('home');
