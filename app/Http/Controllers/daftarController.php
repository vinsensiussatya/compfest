<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\User;
use App\data_franchisee as franchisee;
use Response;

class daftarController extends Controller
{
    public function index()
    {

        $data_franchisee = franchisee::paginate(10);

        return view('franchisee.data_franchisee')->with('data_franchisee', $data_franchisee);
        
    }

    public function hapus($id)
    {
        User::find($id)->delete();
        $data_franchisee = franchisee::paginate(10);

        return view('franchisee.data_franchisee')->with('data_franchisee', $data_franchisee);
    }

    public function edit($id)
    {
        $data_franchisee = franchisee::where('id', $id)->first();

        return view('franchisee.edit_data')->with('fran', $data_franchisee);
    }

    public function update($id, Request $request) {
         $this->validate($request,
                [
                'nama' => 'required', 
                ]);
        $fran = franchisee::findOrFail($id);
        $fran->update($request->all());

        $data_franchisee = franchisee::paginate(10);

       	
        return view('franchisee.data_franchisee')->with('data_franchisee', $data_franchisee);
    }

}
