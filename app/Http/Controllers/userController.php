<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Response;
use Auth;
use App\role;

class userController extends Controller
{
    	public function authenticate(Request $request) {
		$credentials = $request->only('email', 'password');

		try {
			if (!$token = JWTAuth::attempt($credentials)) {
				return response()->json(['error' => 'invalid_credentials'], 401);
			}
		} catch (JWTException $e) {
			// something went wrong
			return response()->json(['error' => 'could_not_create_token'], 500);
		}

		$user = Auth::user();

		$role = role::where('user_id',$user->id)->get();

		foreach ($role as $roler){
			$shit = array("role_id" => $roler->role_id);
		}

		
		// if no errors are encountered we can return a JWT
		//return response()->json(compact('token'));
		
		if($user != null){
		return response()->json(array('user'=>$user,'role'=>$shit));
		}

		else{
			return response()->json(['error' => 'invalid_credentials'], 401);
		}
	}

	public function getAuthenticatedUser() {
		// try {

		// 	if (!$user = JWTAuth::parseToken()->authenticate()) {
		// 		return response()->json(['user_not_found'], 404);
		// 	}

		// } catch (TokenExpiredException $e) {

		// 	return response()->json(['token_expired'], $e->getStatusCode());

		// } catch (TokenInvalidException $e) {

		// 	return response()->json(['token_invalid'], $e->getStatusCode());

		// } catch (JWTException $e) {

		// 	return response()->json(['token_absent'], $e->getStatusCode());

		// }
		$user = User::all();

		return response()->json($user);
	}

	public function register(Request $request) {
	
		$data = new User();
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->password = Hash::make($request->input('password'));
        $success = $data->save();

	if(!$success){
		  return Response::json("error saving",500);
		}
		 
	return Response::json("success",201);



		
	}
}
