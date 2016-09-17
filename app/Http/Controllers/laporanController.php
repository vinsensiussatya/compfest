<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\laporan;

use Response;

class laporanController extends Controller
{
    public function index()
    {
    	$laporan = laporan::all();
        return Response::json($laporan,200);
    }

    public function store(Request $request){
    	 $data = new laporan();
        $data->user_id =  $request->get('user_id');
        $data->tanggal = $request->get('tanggal');
        $data->presentase1 = $request->get('presentase1');
        $data->presentase2 = $request->get('presentase2');
        $data->status_pembayaran = $request->get('status_pembayaran');
		$success = $data->save();

	if(!$success){
		  return Response::json("error saving",500);
		}
		 
	return Response::json("success",201);

    }

    public function show($id)
    {
	$data=laporan::find($id);
	if(is_null($data))
	{
	     return Response::json("not found",404);
	}
 
	return Response::json($comment,200);
}

    public function update($id)
	{
		$data=laporan::find($id);
	 
		if(!is_null(Input::get('tanggal')))
		{
			$data->nama=Input::get('tanggal');
		}
	 
		if(!is_null(Input::get('presentase1')))
		{
			$data->alamat=Input::get('presentase1');
		}

		if(!is_null(Input::get('presentase2')))
		{
			$data->npwp=Input::get('presentase2');
		}
	 	
	 	if(!is_null(Input::get('status_pembayaran')))
		{
			$data->status_aktif=Input::get('status_pembayaran');
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
	$data=laporan::find($id);
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
