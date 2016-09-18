@extends('layouts.app')


@section('content')
<ol style="padding: 8px 100px" class="breadcrumb">
  <li><a href="{{ url('/home') }}">Home</a></li>
  <li><a href="{{ url('/datafranchisee') }}">Data Franchisee</a></li>
  <li><a href="#">Tambah Data</a></li>
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

<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{url('/tambah/'.$fran->id) }}" method="post" enctype="multipart/form-data" style="margin-top:20px">


<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" name="nama" value="" class="form-control col-md-7 col-xs-12">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" name="alamat" value="" class="form-control col-md-7 col-xs-12">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">NPWP <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" name="npwp" value="" class="form-control col-md-7 col-xs-12">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Aktif <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" name="status_aktif" value="" class="form-control col-md-7 col-xs-12">
    </div>
  </div>

  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="submit" class="btn btn-primary">Batal</button>
      <button type="submit" class="btn btn-success">Simpan</button>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
  </div>

</form>
@endsection

