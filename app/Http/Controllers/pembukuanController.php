<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\pembukuan;

use Response;

use Auth;

class pembukuanController extends Controller
{
     public function index()
    {
    	$pembukuan = pembukuan::all();
        return Response::json($pembukuan,200);
    }

    public function store(Request $request){
    	 $data = new pembukuan();
        $data->user_id =  $request->get('user_id');
        $data->tanggal = $request->get('tanggal');
        $data->uraian = $request->get('uraian');
        $data->debet = $request->get('debet');
        $data->kredit = $request->get('kredit');
        $data->total_debet = $request->get('total_debet');
        $data->total_kredit = $request->get('total_kredit');
		$data->total = $request->get('total');
		$success = $data->save();

	if(!$success){
		  return Response::json("error saving",500);
		}
		 
	return Response::json("success",201);

    }

    public function show($id)
    {
	$data=pembukuan::find($id);
	if(is_null($data))
	{
	     return Response::json("not found",404);
	}
 
	return Response::json($comment,200);
}

    public function update($id)
	{
		$data=pembukuan::find($id);
	 
		if(!is_null(Input::get('tanggal')))
		{
			$data->nama=Input::get('tanggal');
		}
	 
		if(!is_null(Input::get('uraian')))
		{
			$data->alamat=Input::get('uraian');
		}

		if(!is_null(Input::get('debet')))
		{
			$data->npwp=Input::get('debet');
		}
	 	
	 	if(!is_null(Input::get('kredit')))
		{
			$data->status_aktif=Input::get('kredit');
		}


		if(!is_null(Input::get('total_debet')))
		{
			$data->npwp=Input::get('total_debet');
		}
	 	
	 	if(!is_null(Input::get('total_kredit')))
		{
			$data->status_aktif=Input::get('total_kredit');
		}

		if(!is_null(Input::get('total')))
		{
			$data->status_aktif=Input::get('total');
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
	$data=pembukuan::find($id);
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
