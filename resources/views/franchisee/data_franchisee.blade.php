@extends('layouts.app')


@section('content')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}">Home</a></li>
  <li><a href="#">Data Franchisee</a></li>
</ol>

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

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">DAFTAR FRANCHISEE</div>

				<div class="x_title">
				</div>
				<div class="panel-body">
					<table>
					  	<tr>
					  		<th>ID</th>
					    	<th>Nama</th>
					    	<th>Alamat</th>
					    	<th>NPWP</th>
					    	<th>Tanggal Daftar</th>
					    	<th>Status Aktif</th>
					    	<th>Aksi</th>
					   	</tr>

					   	<?php $i=0; ?>
					        @foreach ($data_franchisee as $fran)
					    <?php $i++; ?>
					  	<tr>
					  		<td>{{$fran->user_id}}</td>
					    	<td>{{$fran->nama}}</td>
					     	<td>{{$fran->alamat}}</td>
					     	<td>{{$fran->npwp}}</td>
					     	<td>{{$fran->tanggal_mulai}}</td>
					     	<td>{{$fran->status_aktif}}</td>
					     	<td><a class="btn btn-warning" data-placement="bottom" title="Update" href="#"><span class="glyphicon glyphicon-pencil"></a>
					     		<a class="btn btn-danger" data-placement="bottom" title="Hapus" data-toggle="modal" href="#" data-target="#modaldelete<?php echo $fran->id;?>"><span class="glyphicon glyphicon-trash"></a>
					     		
     						</td>

     						<div class="modal fade" id="modaldelete<?php echo $fran->id;?>" tabindex="-1" role="dialog">
		                        <div class="modal-dialog modal-sm" role="document">
		                            <div class="modal-content">
		                                <div class="modal-header">
		                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
		                                        <span aria-hidden="true">&times;</span>
		                                    </button>
		                                    <h4 class="modal-title"><b>Perhatian</b></h4>
		                                </div>

		                                <div class="modal-body">
		                                    <input type="hidden" value="<?php echo $fran->id;?>" name="id">
		                                    <h5>Apakah Anda yakin akan menghapus franchisee ini?</h5>
		                                </div>
		                                <div class="modal-footer">
		                                    <a class="btn btn-info btn-simple pull-left" style="width:60px" title="Kembali" data-dismiss="modal">Tidak</a>
		                                    <a class="btn btn-danger btn-simple pull-right" style="width:60px" title="Hapus" href="{{ action('daftarController@hapus', $fran->user_id) }}">Ya</a>
		                                </div>
		                          
		                            </div>
		                        </div>
		                    </div>
						    
						</tr>
						@endforeach
					</table>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection

