<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\notapersen;

use Response;

class notaee extends Controller
{
    public function show($id)
    {
	$data=notapersen::where('user_id',$id)->paginate(5);
	if(is_null($data))
	{
	     return Response::json("not found",404);
	}
 
	return Response::json($data,200);
}
}
