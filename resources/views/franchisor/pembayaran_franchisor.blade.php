@extends('layouts.app')


@section('content')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}">Home</a></li>
  <li><a href="#">Pembayaran</a></li>
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
    background-color: #4CAF50;
    color: white;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">PEMBAYARAN</div>

				<div class="x_title">
				</div>
				<div class="panel-body">
					<table>
					  	<tr>
					  		<th>ID Franchisee</th>
					    	<th>Tanggal</th>
					    	<th>Persentase Franchisor</th>
					    	<th>Persentase Franchisee</th>
					    	<th>Status Pembayaran</th>
					    	<th>File Nota</th>
					    	<th>Aksi</th>
					   
					   	</tr>

					   	<?php $i=0; ?>
					        @foreach ($daftarnota as $nota)
					    <?php $i++; ?>
					  	<tr>
					  		<td>{{$nota->user_id}}</td>
					    	<td>{{$nota->tanggal}}</td>
					     	<td>{{$nota->presentase1}}</td>
					     	<td>{{$nota->presentase2}}</td>
					     	<td>{{$nota->status_pembayaran}}</td>
					     	<td><a href="upload/notapembayaran/<?php echo $nota->id; echo '_'; echo $nota->filename;?>">{{ $nota->filename }}</a>
					     	<td><a class="btn btn-success" data-placement="bottom" title="Terima" data-toggle="modal" href="#" data-target="#modalok<?php echo $nota->id;?>"><span class="glyphicon glyphicon-ok"></a>
					     		<a class="btn btn-danger" data-placement="bottom" title="Tolak" data-toggle="modal" href="#" data-target="#modaldelete<?php echo $nota->id;?>"><span class="glyphicon glyphicon-remove"></a>
					     		
     						</td>

     						<div class="modal fade" id="modaldelete<?php echo $nota->id;?>" tabindex="-1" role="dialog">
		                        <div class="modal-dialog modal-sm" role="document">
		                            <div class="modal-content">
		                                <div class="modal-header">
		                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
		                                        <span aria-hidden="true">&times;</span>
		                                    </button>
		                                    <h4 class="modal-title"><b>Perhatian</b></h4>
		                                </div>

		                                <div class="modal-body">
		                                    <input type="hidden" value="<?php echo $nota->id;?>" name="id">
		                                    <h5>Apakah Anda yakin akan menolak file ini?</h5>
		                                </div>
		                                <div class="modal-footer">
		                                    <a class="btn btn-info btn-simple pull-left" style="width:60px" title="Kembali" data-dismiss="modal">Tidak</a>
		                                    <a class="btn btn-danger btn-simple pull-right" style="width:60px" title="Hapus" href="{{ action('notaController@tolak', $nota->id) }}">Ya</a>
		                                </div>
		                          
		                            </div>
		                        </div>
		                    </div>

     						<div class="modal fade" id="modalok<?php echo $nota->id;?>" tabindex="-1" role="dialog">
		                        <div class="modal-dialog modal-sm" role="document">
		                            <div class="modal-content">
		                                <div class="modal-header">
		                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
		                                        <span aria-hidden="true">&times;</span>
		                                    </button>
		                                    <h4 class="modal-title"><b>Perhatian</b></h4>
		                                </div>

		                                <div class="modal-body">
		                                    <input type="hidden" value="<?php echo $nota->id;?>" name="id">
		                                    <h5>Apakah Anda yakin akan menerima file ini?</h5>
		                                </div>
		                                <div class="modal-footer">
		                                    <a class="btn btn-danger btn-simple pull-left" style="width:60px" title="Kembali" data-dismiss="modal">Tidak</a>
		                                    <a class="btn btn-info btn-simple pull-right" style="width:60px" title="Hapus" href="{{ action('notaController@terima', $nota->id) }}">Ya</a>
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

