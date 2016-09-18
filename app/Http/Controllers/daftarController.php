<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Request as reques;
use App\User;
use App\roler;
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

    public function registeri()
    {
        return view('auth.registeri');  
    }

    protected function create(Request $request)
    {
        $sandi = reques::get('password');
        $mantap = new User();
        $mantap->name = reques::get('name');
        $mantap->email = reques::get('email');
        $mantap->password = bcrypt($sandi);
        $mantap->save();

        return view('franchisee.tambah_data')->with('fran', $mantap);
    }

    protected function tambah(Request $request, $id)
    {
        $peran = new roler();
        $peran->role_id = "2";
        $peran->user_id = $id;
        $peran->save();

        $tampan = new franchisee();
        $tampan->user_id = $id;
        $tampan->nama = reques::get('nama');
        $tampan->alamat = reques::get('alamat');
        $tampan->npwp = reques::get('npwp');
        $tampan->tanggal_mulai = date('d-m-Y');
        $tampan->status_aktif = reques::get('status_aktif');
     
        $tampan->save();
        $data_franchisee = franchisee::paginate(10);

        return view('franchisee.data_franchisee')->with('data_franchisee', $data_franchisee);
    }
}
