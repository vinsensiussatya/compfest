<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Khill\Lavacharts\Lavacharts;

use App\pembukuan;

use Auth;

class statistikController extends Controller
{
     public function pengeluaranbulan (){

      $user_id = Auth::user();

    $year = date("Y");
    $stocksTable = \Lava::DataTable();

    $stocksTable->addStringColumn('Total')
              ->addNumberColumn('Bulan');

   
      $jumlah = array(0,0,0,0,0,0,0,0,0,0,0,0);

      $i=0;
    
      $month = array('01','02','03','04','05','06','07','08','09','10','11','12');


        for($i=0; $i<=11; $i++){

          $bp2yeah = pembukuan::whereYear('created_at', '=', $year)
                      ->whereMonth('created_at', '=', $month[$i])->where('user_id','!=',$user_id->id)
                      ->get();
          foreach ($bp2yeah as $bp2) {
                  $total = $bp2->saldo/4;

                  $jumlah[$i]=$jumlah[$i]+(int)$total;
               }     


          if($jumlah[$i] != 0){

            $jml = $jumlah[$i];


            $bln = $month[$i];

            switch ($month[$i]) {
              case '01':
                $bln = "Januari";
                break;
              case '02':
                $bln = "Februari";
                break;
              case '03':
                $bln = "Maret";
                break;
              case '04':
                $bln = "April";
                break;
              case '05':
                $bln = "Mei";
                break;
              case '06':
                $bln = "Juni";
                break;
              case '07':
                $bln = "Juli";
                break;
              case '08':
                $bln = "Agustus";
                break;
              case '09':
                $bln = "September";
                break;
              case '10':
                $bln = "Oktober";
                break;
              case '11':
                $bln = "November";
                break;
              case '12':
                $bln = "Desember";
                break;
              default:
                $bln = "Bulan";
            }

            $rowData = array(
                 $bln, $jml);

                 $stocksTable->addRow($rowData);
            }
          }
         
          $Chart = \Lava::BarChart('Pengeluaran')
                  ->setOptions(array(
                    'datatable' => $stocksTable,
                    'title' => 'Pemasukan'
                  ));
    return view('statistik.statistik');
                
  }


   public function pengeluaranfranchisee (){

    $user_id = Auth::user();
    $year = date("Y");
    $stocksTable = \Lava::DataTable();

    $stocksTable->addStringColumn('Tahun')
              ->addNumberColumn('Debet')
              ->addNumberColumn('Kredit')
              ->addNumberColumn('Saldo');

      $jumlahberangkat = array(0,0,0,0,0,0,0,0,0,0,0,0);
      $jumlahkembali = array(0,0,0,0,0,0,0,0,0,0,0,0);
      $jumlah = array(0,0,0,0,0,0,0,0,0,0,0,0);

      $i=0;
    
      $month = array('01','02','03','04','05','06','07','08','09','10','11','12');


        for($i=0; $i<=11; $i++){

          $bp2yeah = pembukuan::whereYear('created_at', '=', $year)
                      ->whereMonth('created_at', '=', $month[$i])->where('user_id','=',$user_id->id)
                      ->get();
          foreach ($bp2yeah as $bp2) {
                  $berangkat = $bp2->debet;
                  $jumlahberangkat[$i]=$jumlahberangkat[$i]+(int)$berangkat;

                  $kembali = $bp2->kredit;
                  $jumlahkembali[$i]=$jumlahkembali[$i]+(int)$kembali;

                  $jumlah[$i]=$jumlahberangkat[$i]-$jumlahkembali[$i];
               }     


          if($jumlah[$i] != 0){

            $jml = $jumlah[$i];
            $jmlberangkat = $jumlahberangkat[$i];
            $jmlkembali = $jumlahkembali[$i]; 
            $bln = $month[$i];

            switch ($month[$i]) {
              case '01':
                $bln = "Januari";
                break;
              case '02':
                $bln = "Februari";
                break;
              case '03':
                $bln = "Maret";
                break;
              case '04':
                $bln = "April";
                break;
              case '05':
                $bln = "Mei";
                break;
              case '06':
                $bln = "Juni";
                break;
              case '07':
                $bln = "Juli";
                break;
              case '08':
                $bln = "Agustus";
                break;
              case '09':
                $bln = "September";
                break;
              case '10':
                $bln = "Oktober";
                break;
              case '11':
                $bln = "November";
                break;
              case '12':
                $bln = "Desember";
                break;
              default:
                $bln = "Bulan";
            }

            $rowData = array(
                 $bln, $jmlberangkat, $jmlkembali, $jml);

                 $stocksTable->addRow($rowData);
            }
          }
         
          $Chart = \Lava::BarChart('Pengeluaran')
                  ->setOptions(array(
                    'datatable' => $stocksTable,
                    'title' => 'Debet, Kredit, Saldo'
                  ));
    return view('statistik.statistikfra');
                
  }

}
