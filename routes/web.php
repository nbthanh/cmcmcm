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

	Route::group(['prefix' => 'admin'], function() {
	    Route::get('/', 'AdminController@index');

	    Route::group(['prefix' => 'category'], function() {
	    	Route::get('/', function(){
		    	return redirect()->route('admin.category.list');
		    });
		    Route::get('/list', 'AdminController@categoryLIST')->name('admin.category.list');

		    Route::get('/add', 'AdminController@categoryADD')->name('admin.category.add');
		    Route::post('/add', 'AdminController@categoryPOSTADD')->name('admin.category.postadd');

		    Route::get('/edit', 'AdminController@categoryEDIT')->name('admin.category.edit');
	    });

	    Route::group(['prefix' => 'post'], function(){
	    	Route::get('/', function(){
		    	return redirect()->route('admin.post.list');
		    });
		    Route::get('/list', 'AdminController@postLIST')->name('admin.post.list');
		    Route::get('/add', 'AdminController@postADD')->name('admin.post.add');
		    Route::get('/edit', 'AdminController@postEDIT')->name('admin.post.edit');
	    });


	    Route::group(['prefix' => 'chapter'], function(){
	    	Route::get('/', function(){
		    	return redirect()->route('admin.chapter.list');
		    });
		    Route::get('/list', 'AdminController@chapterLIST')->name('admin.chapter.list');
		    Route::get('/add', 'AdminController@chapterADD')->name('admin.chapter.add');
		    Route::get('/edit', 'AdminController@chapterEDIT')->name('admin.chapter.edit');
	    });

	    Route::group(['prefix' => 'user'], function(){
	    	Route::get('/', function(){
		    	return redirect()->route('admin.user.list');
		    });
		    Route::get('/list', 'AdminController@userLIST')->name('admin.user.list');
		    Route::get('/add', 'AdminController@userADD')->name('admin.user.add');
		    Route::get('/edit', 'AdminController@userEDIT')->name('admin.user.edit');
	    });
	});