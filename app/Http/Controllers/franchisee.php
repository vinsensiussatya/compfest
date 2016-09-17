<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\data_franchisee;
use Response;

class franchisee extends Controller
{
    public function index()
    {
    	$data_franchisee = data_franchisee::all();
        return Response::json($data_franchisee,200);
    }

    public function store(Request $request){
    	 $data = new data_franchisee();
        $data->user_id = $request->get('user_id');
        $data->nama = $request->get('nama');
        $data->alamat = $request->get('alamat');
        $data->npwp = $request->get('npwp');
        $data->tanggal_mulai = $request->get('tanggal_mulai');
        $data->status_aktif = $request->get('status_aktif');
        $success = $data->save();

	if(!$success){
		  return Response::json("error saving",500);
		}
		 
	return Response::json("success",201);

    }

    public function show($id)
    {
	$data=data_franchisee::find($id);
	if(is_null($data))
	{
	     return Response::json("not found",404);
	}
 
	return Response::json($comment,200);
}

    public function update($id)
	{
		$data=data_franchisee::find($id);
	 
		if(!is_null(Input::get('nama')))
		{
			$data->nama=Input::get('nama');
		}
	 
		if(!is_null(Input::get('alamat')))
		{
			$data->alamat=Input::get('alamat');
		}

		if(!is_null(Input::get('npwp')))
		{
			$data->npwp=Input::get('npwp');
		}
	 	
	 	if(!is_null(Input::get('status_aktif')))
		{
			$data->status_aktif=Input::get('status_aktif');
		}


		$success=$data->save();
	 
		if(!$success)
		{
			return Response::json("error updating",500);
		}
	 
		return Response::json("success",201);
	}
	

public function destroy($id)
{
	$data=data_franchisee::find($id);
	if(is_null($data))
	{
		return Response::json("not found",404);
	}
 
	$success=$data->delete();
 
	if(!$success)
	{
		return Response::json("error deleting",500);
	}
 
	return Response::json("success",200);
}






}
