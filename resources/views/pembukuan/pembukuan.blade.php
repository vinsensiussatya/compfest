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
    background-color: #4CAF50;
    color: white;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

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
                 
                 <td><center><a class="btn btn-danger" data-placement="bottom" title="Hapus Data" data-toggle="modal" href="#" data-target="#modaldelete<?php echo $booking->id;?>"><span class="glyphicon glyphicon-trash"></a></td>
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

{!!$book->render()!!}

@role(2)
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
<h2>Tambah Pembukuan</h2>
<form action="{{ url('franchisee/pembukuan') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="form-group">
        <input required="required" value="" placeholder="Tanggal" type="text" name = "tanggal" class="form-control" />
    </div>

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
@endrole
            </div>
        </div>
    </div>
</div>





@endsection
