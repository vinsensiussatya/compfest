<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\pembukuan;

use Response;

class buku extends Controller
{
    public function show($id)
    {
	$data=pembukuan::where('user_id',$id)->paginate(5);
	if(is_null($data))
	{
	     return Response::json("not found",404);
	}
 
	return Response::json($data,200);
}
}
