<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\pembukuan;

class pembukuanController extends Controller
{
     public function index()
    {
    	$pembukuan = pembukuan::all();
        return Response::json($pembukuan,200);
    }

    public function store(Request $request){
    	 $data = new pembukuan();
        $data->user_id = $request->get('user_id');
        $data->tanggal = $request->get('tanggal');
        $data->uraian = $request->get('uraian');
        $data->debet = $request->get('debet');
        $data->kredit = $request->get('kredit');
        $data->total_debet = $request->get('total_debet');
        $data->total_kredit = $request->get('total_kredit');
		$data->total_kredit = $request->get('total_kredit');
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
	 
		if(!is_null(Input::get('user_id')))
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
