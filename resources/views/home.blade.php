@extends('layouts.app')

@section('content')


<div class="container" >
 <header class="jumbotron hero-spacer">
 @role(1)
            <h2>Selamat Datang Franchisor!</h2>
        @endrole

         @role(2)
            <h2>Selamat Datang Franchisee!</h2>
        @endrole
            <h6>Familia adalah aplikasi yang memudahkan anda untuk mengatur usaha franchise anda</p>
            <h6>
            </p>
        </header>

        <hr>


   

<hr>

  <div class="container">

        

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Main Menu</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->

        @role(1)
        <div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://www.propertymanagementpuntacana.com/wp-content/uploads/2014/05/Go-Punta-Cana-Real-Estate-Property-Management-Accounting-And-Bookeeping.jpg" alt="">
                    <div class="caption">
                        <h3>Pembukuan</h3>
                        <p>Memudahkan anda untuk melakukan pembukuan</p>
                        <p>
                            <a href="{{url('franchisor/pembukuan')}}" class="btn btn-primary">Mulai</a> 
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://www.hremploymentscreening.com/images-blog/fraudulent-resumes-employment-background-verification-check.jpg" alt="">
                    <div class="caption">
                        <h3>Statistik</h3>
                        <p>Visualisasi data keuangan anda sehingga lebih mudah dimengerti</p>
                        <p>
                            <a href="{{url('statistik/pemasukan')}}" class="btn btn-primary">Mulai</a> 
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src=http://www.desktopimages.org/pictures/2013/0227/1/briefcase-full-of-money-background-354620.jpg alt="">
                    <div class="caption">
                        <h3>Status Pembayaran</h3>
                        <p>Melihat status pembayaran franchisee</p>
                        <p>
                            <a href="{{url('/pembayaranfranchisor')}}" class="btn btn-primary">Mulai</a> 
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://www.bluelandblog2.com/wp-content/uploads/2015/10/business-800x500-300x188.jpg" alt="">
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
@endrole



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
