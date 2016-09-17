@extends('layouts.app')

@section('content')


<div class="container">
 <header class="jumbotron hero-spacer">
 @role(1)
            <h2>Selamat Datang Franchisor!</h2>
        @endrole

         @role(2)
            <h2>Selamat Datang Franchisee!</h2>
        @endrole
            <h6>Familia adalah aplikasi yang memudahkan anda untuk mengatur usaha franchise anda</p>
            <h6><a class="btn btn-primary btn-large">Call to action!</a>
            </p>
        </header>

        <hr>


   

<hr>

  <div class="container">

        

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Features</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Pembukuan</h3>
                        <p>Memudahkan anda untuk melakukan pembukuan</p>
                        <p>
                            <a href="#" class="btn btn-primary">Mulai</a> 
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Statistik</h3>
                        <p>Visualisasi data keuangan anda sehingga lebih mudah dimengerti</p>
                        <p>
                            <a href="#" class="btn btn-primary">Mulai</a> 
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Status Pembayaran</h3>
                        <p>Melihat status pembayaran franchisee</p>
                        <p>
                            <a href="#" class="btn btn-primary">Mulai</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Data Franchisee</h3>
                        <p>Melihat detail data franchisee yang anda miliki</p>
                        <p>
                            <a href="#" class="btn btn-primary">Mulai</a> 
                        </p>
                    </div>
                </div>
            </div>

        </div>




<!-- @role(1)
        

                     <a href="{{url('franchisor/pembukuan')}}" type="button" class="btn btn-info" style="margin-top:-5px"><i class="fa fa-list-alt" style="margin-right:10px"></i>Pembukuan</a>
                     <a href="{{url('statistik/pemasukan')}}" type="button" class="btn btn-info" style="margin-top:-5px"><i class="fa fa-list-alt" style="margin-right:10px"></i>Statistik</a>
                    <a href="{{url('/pembayaranfranchisor')}}" type="button" class="btn btn-info" style="margin-top:-5px"><i class="fa fa-list-alt" style="margin-right:10px"></i>Status Pembayaran</a>
@endrole


@role(2)
                     <a href="{{url('franchisee/pembukuan')}}" type="button" class="btn btn-info" style="margin-top:-5px"><i class="fa fa-list-alt" style="margin-right:10px"></i>Pembukuan</a>
                     <a href="{{url('statistik/franchisee')}}" type="button" class="btn btn-info" style="margin-top:-5px"><i class="fa fa-list-alt" style="margin-right:10px"></i>Statistik</a>
                    <a href="{{url('/pembayaranfranchisee')}}" type="button" class="btn btn-info" style="margin-top:-5px"><i class="fa fa-list-alt" style="margin-right:10px"></i>Status Pembayaran</a>
@endrole

 -->

                
@endsection
