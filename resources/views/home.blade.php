@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #FF9800; color: white">Menu Utama</div>

                <div class="panel-body">
@role(1)
        

                     <a href="{{url('franchisor/pembukuan')}}" type="button" class="btn btn-info" style="margin-top:-5px"><i class="fa fa-list-alt" style="margin-right:10px"></i>Pembukuan</a>
                     <a href="{{url('statistik/pemasukan')}}" type="button" class="btn btn-info" style="margin-top:-5px"><i class="fa fa-list-alt" style="margin-right:10px"></i>Statistik</a>
                    <a href="{{url('/pembayaranfranchisor')}}" type="button" class="btn btn-info" style="margin-top:-5px"><i class="fa fa-list-alt" style="margin-right:10px"></i>Status Pembayaran</a>
@endrole


@role(2)
                     <a href="{{url('franchisee/pembukuan')}}" type="button" class="btn btn-info" style="margin-top:-5px"><i class="fa fa-list-alt" style="margin-right:10px"></i>Pembukuan</a>
                     <a href="{{url('statistik/franchisee')}}" type="button" class="btn btn-info" style="margin-top:-5px"><i class="fa fa-list-alt" style="margin-right:10px"></i>Statistik</a>
                    <a href="{{url('/pembayaranfranchisee')}}" type="button" class="btn btn-info" style="margin-top:-5px"><i class="fa fa-list-alt" style="margin-right:10px"></i>Status Pembayaran</a>
@endrole



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
