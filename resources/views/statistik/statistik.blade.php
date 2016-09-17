@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}">Home</a></li>
  <li><a href="#">Statistik</a></li>
</ol>


<div id="pengeluaran-div" align="center" style="width: 100%; height: 100%"></div>
<?= \Lava::render('BarChart', 'Pengeluaran', 'pengeluaran-div') ?>

@endsection