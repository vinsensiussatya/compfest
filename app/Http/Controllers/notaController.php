<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\notapersen as nota;
use App\data_franchisee as franchisee;
use App\pembukuan as buku;
use Response;

class notaController extends Controller
{
    public function notafranchisee()
    {

        $id = Auth::user()->id;
        $pembukuan = buku::where('user_id', $id)->orderBy('created_at', 'desc')->first();
        $buku_id = $pembukuan->id;
        if (nota::where('buku_id', '=', $buku_id)->count() == 0)
        {
            $datanota = new nota();
            $datanota->user_id = $id;
            $datanota->buku_id = $buku_id;
            $datanota->tanggal = date('d-m-Y');       
        }

        else
        {
            $datanota = nota::where('buku_id', $buku_id)->firstOrFail();
            if($pembukuan->total <= 0) 
            {
                $datanota->presentase1 = 0;
                $datanota->presentase2 = 0;
                $datanota->save();
                $datanota = nota::where('buku_id', $buku_id)->orWhereNotNull('status_pembayaran')->paginate(10);
            }
            else
            {
                $datanota->presentase1 = 0.25 * $pembukuan->total;
                $datanota->presentase2 = 0.75 * $pembukuan->total;
                $datanota->save();
                $datanota = nota::where('buku_id', $buku_id)->orWhereNotNull('status_pembayaran')->paginate(10);
            }
        }
        

        return view('franchisee.pembayaran_franchisee')->with('datanota', $datanota);
        
    }

    public function notafranchisor()
    {

        $daftarnota = nota::orderBy('created_at','desc')->paginate(10);
        
        return view('franchisor.pembayaran_franchisor')->with('daftarnota', $daftarnota);
    }

    public function storenota(Request $request, $id) {
        // validation rules
    $uploadOk = 1;

    $target_dir = "upload/notapembayaran/";
    $target_file = $target_dir . $id . '_' . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

            $uploadOk = 1;              
        
    }
    // Check if file already exists
    if (file_exists($target_file)) {
            
        $uploadOk = 1;
    }
    // Check file size
    // Allow certain file formats
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } 
    else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
          // $this->import();
          \Session::flash('flash_message', 'Data telah berhasil diimport');
          } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $notalist = nota::where('id', $id)->firstOrFail();
        $notalist->filename = basename($_FILES["fileToUpload"]["name"]);
        $notalist->status_pembayaran = "Belum Diverifikasi";
        $notalist->deskripsi = $request->get('deskripsi');
        $notalist->save();
         
    
        return redirect('/pembayaranfranchisee');
    }

    public function tolak($id) {
        $notalist = nota::where('id', $id)->firstOrFail();
        $notalist->status_pembayaran = "Verifikasi Ditolak";
        $notalist->save();
        return redirect('/pembayaranfranchisor');
    }

    public function terima($id) {
        $notalist = nota::where('id', $id)->firstOrFail();
        $notalist->status_pembayaran = "Verifikasi Diterima";
        $notalist->save();
        return redirect('/pembayaranfranchisor');
    }
}
