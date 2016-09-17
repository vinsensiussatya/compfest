<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\notapersen;
use App\data_franchisee;

use Response;

class notaor extends Controller
{
    public function show()
    {
		$data=notapersen::leftJoin('data_franchisee', 'notapersen.user_id', '=', 'data_franchisee.user_id')->orderBy('notapersen.created_at','desc')->paginate(10);
		if(is_null($data))
		{
	     	return Response::json("not found",404);
		}
 
	return Response::json($data,200);
}
}
