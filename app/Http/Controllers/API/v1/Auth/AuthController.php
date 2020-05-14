<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmptyResource;
use App\Http\Resources\UserResource;
use App\Supports\ApiSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    

    use ApiSettings;
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     */
    public function login(Request $request) { 
        
    	$data = $this->data;

		$rules = [
            'email'    => 'required|email|string',
            'password' => 'required|string',
        ];

        $message = [];

        $validator = Validator::make($request->input(), $rules, $message);

        if ($validator->fails()) {
            return $this->failedResponse($request, $validator->errors()->first());
        }


    	if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){ 
    		
    		$user = Auth::user(); 
    		$token = $user->createToken('Personal Access Token')->accessToken;

    		$user->access_token = $token;

    		array_push($data, $user);
            $user->appData = $this->prepareAppData($request, $data);

            return new UserResource($user);

    	}

    	##FAILED LOGIN
		return $this->failedResponse($request, 'Login Failed. Please Check User and Password', 401);
	}


    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {

        $data = $this->data;

        $request->user()->token()->revoke();

        $emptyData = collect();
        $emptyData->appData = $this->prepareAppData($request, $data);

        return new EmptyResource($emptyData);

    }


    /**
     * Get the authenticated User
     *      
     * @return [json] user object
     */
    public function user(Request $request)
    {
        $data = $this->data;
        
    	$user = $request->user();

        array_push($data, $user);
        $user->appData = $this->prepareAppData($request, $data);

        return new UserResource($user);
    }
}
