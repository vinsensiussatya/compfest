@extends('layouts.app')

@section('content')

<div id="pengeluaran-div" align="center" style="width: 850px; height: 400px"></div>
<?= \Lava::render('BarChart', 'Pengeluaran', 'pengeluaran-div') ?>

@endsection