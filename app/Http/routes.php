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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('portfolio', 'PortfolioController@index');

Route::get('about', 'AboutController@index');

Route::resource('contact', 'ContactController');

Route::get('thumbnail', 'ThumbnailController@index');

Route::resource('update_professionals', 'UpdateProfessionalsController');

Route::resource('update_volunteers', 'UpdateVolunteersController');

Route::resource('update_projects', 'UpdateProjectsController');

Route::resource('update_bio', 'UpdateBioController');

Route::resource('update_feats', 'UpdateFeatsController');

Route::resource('update_activities', 'UpdateActivitiesController');

Route::resource('image', 'ImageController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/mailme', function()
{
	$data = [
		'name' => 'obed',
		'email' => 'obedhehe@covenant.edu',
		'bodymessage' => 'hello there'
	];
	$sent = Mail::send('emails.contact', $data, function($message)
	{
		$message->to("obed.tandadjaja@gmail.com", "Obed")->subject("hello");
	});
	if(!$sent) dd("something went wrong");
});