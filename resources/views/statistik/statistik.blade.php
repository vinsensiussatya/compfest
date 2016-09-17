@extends('layouts.app')

@section('content')

<div id="pengeluaran-div" align="center" style="width: 1000px; height: 700px"></div>
<?= \Lava::render('BarChart', 'Pengeluaran', 'pengeluaran-div') ?>

@endsection