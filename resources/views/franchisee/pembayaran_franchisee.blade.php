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
					    	<th>Tanggal</th>
					    	<th>Persentase Franchisor</th>
					    	<th>Persentase Franchisee</th>
					    	<th>Status Pembayaran</th>
					    	<th>File Nota</th>
					    	<th>Aksi</th>
					   
					   	</tr>

					   	<?php $i=0; ?>
					        @foreach ($datanota as $nota)
					    <?php $i++; ?>
					  	<tr>
					    	<td>{{$nota->tanggal}}</td>
					     	<td>{{$nota->presentase1}}</td>
					     	<td>{{$nota->presentase2}}</td>
					     	<td>{{$nota->status_pembayaran}}</td>
					     	<td><a href="upload/notapembayaran/<?php echo $nota->id; echo '_'; echo $nota->filename;?>">{{ $nota->filename }}</a>
					     	<td> 
     							<a class="btn btn-success" data-placement="bottom" title="Lihat Data" data-toggle="modal" data-id ="book->id" data-target="#modalshow<?php echo $nota->id;?>" href="#">Upload Nota</a>
     						</td>

						    <div id="modalshow<?php echo $nota->id;?>" class="modal fade" role="dialog">
						  		<div class="modal-dialog">
						    		<div class="modal-content">
						      			<div class="modal-header">
						        			<button type="button" class="close" data-dismiss="modal">&times;</button>
						        			<h4 class="modal-title">Upload Nota</h4>
						      			</div>
							      		<div class="modal-body">
							      			Tanggal : {{$nota->tanggal}}
							      			<br>
											<form action="{{ url('/pembayaranfranchisee/'.$nota->id) }}" method="post" enctype="multipart/form-data">
												<div class="col-xs-8">
												Deskripsi Nota :<br>
								  				<input class="form-control" type="text" name="deskripsi" value="">
								  				</div><br>

								    			<div class="col-xs-8">
								    			Upload File Nota(maks 500kb) :
								        			<input type="file" class="btn btn-default btn-file" value="fileToUpload" name="fileToUpload" id="fileToUpload" required="required"  />
								    			</div>
								    			<br>
								    			<br>
								    			<br>
								    			<br>
								      	</div>

								      	<div class="modal-footer">
								      		<input class="btn btn-success" type="submit" value="Simpan"/>
												<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
											
								        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								      	</div>
								      	</form>
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

