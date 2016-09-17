<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\pembukuan;

use Auth;


class pembukuanWeb extends Controller
{
    public function getData()
    {
    	$user_id = Auth::user();

          $book = pembukuan::where('user_id', $user_id->id)->orderBy('created_at','desc')->paginate(10);
        
       	  return view('pembukuan.pembukuan')->with('book', $book);
    }


     public function store(Request $request) {
		
		$user_id = Auth::user();

        $book = new pembukuan();
        $book->user_id = $user_id->id;
        $book->tanggal = $request->get('tanggal');
    	$book->uraian = $request->get('uraian');
    	$book->debet = $request->get('debet');
    	$book->kredit = $request->get('kredit');
        $pembukuan = $book->save();
        
         return redirect('/franchisee/pembukuan');
    }

    public function destroy($id)
{
	$data=pembukuan::find($id);	
	$data->delete(); 
	return redirect('/franchisee/pembukuan');
}

}

