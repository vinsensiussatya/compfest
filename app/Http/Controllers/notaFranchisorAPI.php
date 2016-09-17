<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\notapersen as nota;
use App\data_franchisee as franchisee;
use Response;

class notaFranchisorAPI extends Controller
{
    public function index()
    {
    	$id = Auth::user()->id;
        $datanota = nota::orderBy('created_at','desc')->paginate(10);
      	return Response::json($datanota,200);
    }

    public function show($id)
    {
    $data=nota::find($id);
    if(is_null($data))
    {
         return Response::json("not found",404);
    }
 
    return Response::json($comment,200);
}

    public function update($id)
    {
        $data=nota::find($id);
     
        if(!is_null(Input::get('tanggal')))
        {
            $data->tanggal=Input::get('tanggal');
        }
     
        if(!is_null(Input::get('presentase1')))
        {
            $data->presentase1=Input::get('presentase1');
        }

        if(!is_null(Input::get('presentase2')))
        {
            $data->presentase2=Input::get('presentase2');
        }
        
        if(!is_null(Input::get('filename')))
        {
            $data->filename=Input::get('filename');
        }

        if(!is_null(Input::get('status_pembayaran')))
        {
            $data->status_pembayaran=Input::get('status_pembayaran');
        }
        
        if(!is_null(Input::get('deskripsi')))
        {
            $data->deskripsi=Input::get('deskripsi');
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
    $data=nota::find($id);
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

    public function tolak($id) {
        $notalist = nota::where('id', $id)->firstOrFail();
        $notalist->status_pembayaran = "4";
        $success = $notalist->save();
        if(!$success)
        {
            return Response::json("error updating",500);
        }
     
        return Response::json("success",201);
    }

    public function terima($id) {
        $notalist = nota::where('id', $id)->firstOrFail();
        $notalist->status_pembayaran = "3";
        $success = $notalist->save();
        if(!$success)
        {
            return Response::json("error updating",500);
        }
     
        return Response::json("success",201);
    }
}