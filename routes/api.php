<?php

// use Illuminate\Http\Request;
use Dingo\Api\Routing\Router;


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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Http\Controllers\API\v1'], function (Router $api) {
    
    ## AUTHENTICATION API ##
    $api->version('v1', ['namespace' => 'Auth'], function (Router $api) {
		$api->post('login', 'AuthController@login');


		$api->group(['middleware' => 'auth:api'], function ($api) {
			$api->get('user', 'AuthController@user');
			$api->get('logout', 'AuthController@logout');
    	});
    });


    ## LISTING API ##
    $api->version('v1', ['namespace' => 'Listings'], function (Router $api) {
    	$api->group(['middleware' => 'auth:api'], function ($api) {

			$api->post('listing', 'ApiListingController@index');

    	});
    });
});

