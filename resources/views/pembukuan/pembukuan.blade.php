@extends('layouts.app')

@section('content')

<style type="text/css">

    table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #FF9800;
    color: white;
}
</style>



              

<div style="float: left; margin-left: 100px">

<h2>Tabel Pembukuan</h2>
<hr>
<table>

<tr>
    <th>id</th>
    <th>Tanggal</th>
    <th>Uraian</th>
    <th>Debet</th>
    <th>Kredit</th>
    <th>Debet-Kredit</th>
    <th>Saldo</th>
    <th></th>
</tr>

                    @foreach ($book as $booking)
              <tr>
                <td>{{$booking->id}}</td>
                 <td>{{$booking->tanggal}}</td>
                 <td>{{$booking->uraian}}</td>
                 <td>{{$booking->debet}}</td>
                 <td>{{$booking->kredit}}</td>
                 <td>{{$booking->saldo}}</td>
                 <td>{{$booking->total}}</td>
                 
                 <td><center><a class="btn btn-danger" data-placement="bottom" title="Hapus Data" data-toggle="modal" href="#" data-target="#modaldelete<?php echo $booking->id;?>">Hapus</a></td>
              </tr>


               <div class="modal fade" id="modaldelete<?php echo $booking->id;?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title"><b>Perhatian</b></h4>
                                </div>

                                <div class="modal-body">
                                    <input type="hidden" value="<?php echo $booking->id;?>" name="id">
                                    <h5>Apakah Anda yakin akan menghapus data ini?</h5>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-info btn-simple pull-left" style="width:60px" title="Kembali" data-dismiss="modal">Tidak</a>
                                    <a class="btn btn-danger btn-simple pull-right" style="width:60px" title="Hapus" href="{{ action('pembukuanWeb@destroy', $booking->id) }}">Ya</a>
                                </div>
                          
                            </div>
                        </div>
                    </div>
              


@endforeach


</table>


<div align="center"> {!!$book->render()!!} </div>
</div>


@role(2)


<div style="float: right; margin-right: 200px">

<div>
<h2>Tambah Pembukuan</h2>
</div>

<hr>

<div>
<form action="{{ url('franchisee/pembukuan') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
  <!--   <div class="form-group">
        <input required="required" value="" placeholder="Tanggal" type="text" name = "tanggal" class="form-control" />
    </div> -->
<div>
                          <div class="col-xs-4">
                          <select name="tanggal" class="form-control">
                            <option> - Hari - </option>
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                          </select>
                          </div>

                          <div class="col-xs-4">
                          <select name="bulan" class="form-control">
                            <option> - Bulan - </option>
                            <option value="01">January</option>
                            <option value="02">Febuary</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                          </select>
                          </div>

                          <div class="col-xs-4">
                          <select name="tahun" class="form-control">
                            <option> - Tahun - </option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>                            
                          </select>
                          </div>
                          </div>
                          
<br>
<br>
<br>

    <div class="form-group">
        <input required="required" value="" placeholder="Uraian" type="text" name = "uraian" class="form-control" />
    </div>


    <div class="form-group">
        <input required="required" value="" placeholder="Debet" type="text" name = "debet" class="form-control" />
    </div>

    <div class="form-group">
        <input required="required" value="" placeholder="Kredit" type="text" name = "kredit" class="form-control" />
    </div>
    
    <div class="col-xs-5">
        <input type="submit" class="btn btn-success pull-right" value="Tambah" name="submit"/>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    </div>
</form>
</div>

</div>

@endrole


@role(1)



<div style="float: right; margin-right: 200px">

<h2>Tambah Pembukuan</h2>
<hr>
<form action="{{ url('franchisor/pembukuan') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div>
                          <div class="col-xs-4">
                          <select name="tanggal" class="form-control">
                            <option> - Hari - </option>
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                          </select>
                          </div>

                          <div class="col-xs-4">
                          <select name="bulan" class="form-control">
                            <option> - Bulan - </option>
                            <option value="01">January</option>
                            <option value="02">Febuary</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                          </select>
                          </div>

                          <div class="col-xs-4">
                          <select name="tahun" class="form-control">
                            <option> - Tahun - </option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>                            
                          </select>
                          </div>
                          </div>

                      <br>
                      <br>
                      </br>    

    <div class="form-group">
        <input required="required" value="" placeholder="Uraian" type="text" name = "uraian" class="form-control" />
    </div>


    <div class="form-group">
        <input required="required" value="" placeholder="Debet" type="text" name = "debet" class="form-control" />
    </div>

    <div class="form-group">
        <input required="required" value="" placeholder="Kredit" type="text" name = "kredit" class="form-control" />
    </div>
    
    <div >
        <input type="submit" class="btn btn-success pull-right" value="Tambah" name="submit"/>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    </div>
</form>

         </div>
@endrole









@endsection
