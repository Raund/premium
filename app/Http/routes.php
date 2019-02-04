<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('/contact', function(){
	if (Request::ajax()){
		$user = array(
			'email' => Input::get('email')
		);
		$data = array(
			'name' => Input::get('name'),
			'email' => Input::get('email'),
			'message_body' => Input::get('message')
		);
		/*dd($data);*/
		$rules = array(
			'name'  => 'required|max:50',
			'email' => 'required|email',
			'message_body' => 'required|min:6',
		);
		$validation = Validator::make($data, $rules);

		if ($validation->fails())
		{
			//return Redirect::to('/')->withErrors($validation)->withInput();
			return response()->json([
				"status" => 'error'
			]);
		}


		Mail::send('emails.letter', $data, function($message) use ($user) {
			$message->to('webtestingstudio@gmail.com', 'Premium Club')->subject('Повідомлення з сайту Premium Club ');
		});
		return response()->json([
			"status" => 'success'
		]);
	}


});


Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/', 'Frontend\HomeController@index');

Route::group(['prefix'=>'admin30x5', 'middleware' => ['auth', 'backend.init']], function(){
	Route::get('/','Backend\AdminDashboardController@index');

	Route::get('/articles/fileoptimize/{id?}','Backend\AdminArticlesController@fileoptimize');
	Route::get('/articles/{type}','Backend\AdminArticlesController@index');
	Route::get('/articles/{type}/create','Backend\AdminArticlesController@create');
	Route::post('/articles/{type}/create','Backend\AdminArticlesController@store');
	Route::get('/articles/{type}/{id}','Backend\AdminArticlesController@edit');
	Route::put('/articles/{type}/{id}','Backend\AdminArticlesController@update');
	Route::delete('/articles/{type}/{id}','Backend\AdminArticlesController@destroy');

	Route::get('/texts','Backend\AdminTextsController@index');
	Route::get('/texts/create','Backend\AdminTextsController@create');
	Route::post('/texts/create','Backend\AdminTextsController@store');
	Route::delete('/texts/{id}','Backend\AdminTextsController@destroy');
	Route::get('/texts/{id}','Backend\AdminTextsController@edit');
	Route::put('/texts/{id}','Backend\AdminTextsController@update');

});

Route::group(['middleware' => 'frontend.init'], function(){
	Route::get('/{lang}/booking', 'Frontend\BookingController@index');
	Route::get('/{lang}/3dtour', 'Frontend\TourController@index');
	Route::get('/{lang}/{type?}', 'Frontend\ArticleController@index')->where('type', 'hotel|rooms|services|events|gallery|contact|3dtour');;
});



