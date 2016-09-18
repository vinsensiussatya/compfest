@extends('layouts.app')

@section('content')


<div class="container" >
 <!-- <header>
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


   

<hr> -->

  <div class="container">

        

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Main Menu</h3>
            </div>
        </div>

        <hr>
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
                    <img src="http://www.desktopimages.org/pictures/2013/0227/1/briefcase-full-of-money-background-354620.jpg" alt="">
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
                            <a href="{{url('/datafranchisee')}}" class="btn btn-primary">Mulai</a> 
                        </p>
                    </div>
                </div>
            </div>

        </div>
@endrole




 @role(2)
        
<div align="center">
        <div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://www.propertymanagementpuntacana.com/wp-content/uploads/2014/05/Go-Punta-Cana-Real-Estate-Property-Management-Accounting-And-Bookeeping.jpg" alt="">
                    <div class="caption">
                        <h3>Pembukuan</h3>
                        <p>Memudahkan anda untuk melakukan pembukuan</p>
                        <p>
                            <a href="{{url('franchisee/pembukuan')}}" class="btn btn-primary">Mulai</a> 
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
                            <a href="{{url('statistik/franchisee')}}" class="btn btn-primary">Mulai</a> 
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src=http://www.desktopimages.org/pictures/2013/0227/1/briefcase-full-of-money-background-354620.jpg alt="">
                    <div class="caption">
                        <h3>Lapor Pembayaran</h3>
                        <p>Melaporkan pembayaran pada franchisor</p>
                        <p>
                            <a <a href="{{url('/pembayaranfranchisee')}}" class="btn btn-primary">Mulai</a> 
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <hr>

</div>
@endrole

@role(1)

<h2>Pemberitahuan
<a type="button" class="btn btn-success btn-simple pull-right" style="float:right; margin-top:-5px" data-toggle="collapse" data-target="#tambahdiary"><i class="fa fa-plus-square" style="margin-right:10px" ></i>Tambah</a>
</h2>
<div class="x_title">
</div>

<div id="tambahdiary" class="collapse" style="margin-left:0px; margin-right:0px; margin-top:0px">
  <script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
  <script type="text/javascript">
  tinymce.init({
    selector : "textarea",
    plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
    toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
  });
  </script>

  <form action="{{ url('diarynewpost') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <input required="required" value="{{ old('title') }}" placeholder="Enter title here" type="text" name = "title"class="form-control" />
    </div>
    <div class="form-group">
      <textarea name='body'class="form-control">{{ old('body') }}</textarea>
    </div>
    <input type="submit" name='publish' class="btn btn-success pull-right" value = "Publish"/>
    <input type="submit" name='save' class="btn btn-default pull-right" value = "Save Draft" />
  </form>
  <hr>
</div>

<hr>

@endrole


@foreach( $diarys as $diary )
    <div class="list-group" style="margin-top:5px">
        <div class="list-group-item">
            <h3><a href="{{ url('diary/'.$diary->slug) }}">{{ $diary->title }}</a>


                    @role(1)
                    @if($diary->active == '1')
                    <div class="btn-group pull-right" role="group" >
                      <button type="button" class="btn btn-warning btn-simple" data-toggle="collapse" data-target="#editdiary<?php echo $diary->id;?>"> <i class=" fa fa-pencil-square-o"></i></button>
                      <button type="button" class="btn btn-danger btn-simple" title="Hapus Data" data-toggle="modal" href="#" data-target="#modaldelete<?php echo $diary->id;?>"><span class="fa fa-trash"></button>
                    </div>

                    <div class="modal fade" id="modaldelete<?php echo $diary->id;?>" tabindex="-1" role="dialog" >
                      <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h4 class="modal-title"><b>Perhatian</b></h4>
                              </div>

                              <div class="modal-body">
                                  <input type="hidden" value="<?php echo $diary->id;?>" name="id">
                                  <h5>Apakah Anda yakin akan menghapus data ini?</h5>
                              </div>
                              <div class="modal-footer">
                                  <a type="button" class="btn btn-info btn-simple pull-left" data-dismiss="modal" style="width:60px;">Tidak</a>
                                  <a class="btn btn-danger btn-simple pull-right" title="Hapus" href="{{  url('/diarydelete/'.$diary->id.'?_token='.csrf_token()) }}"style="width:60px;">Ya</a>
                              </div>
                            </div>
                          </div>
                      </div>

                    <div id="editdiary<?php echo $diary->id;?>" class="collapse" style="margin-left:10px; margin-right:10px; margin-top:50px;">

                      <script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
                      <script type="text/javascript">
                      tinymce.init({
                        selector : "textarea",
                        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
                        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages"
                      });
                      </script>

                      <form action="{{ action('pemberitahuan@update') }}" method="post" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <input type="hidden" name="diary_id" value="{{ $diary->id }}{{ old('diary_id') }}">
                             <div class="form-group">
                               <input required="required" value="@if(!old('title')){{$diary->title}}@endif{{ old('title') }}" placeholder="Judul" type="text" name = "title"class="form-control" />
                             </div>
                             <div class="form-group">
                               <textarea name='body'class="form-control">
                                 @if(!old('body'))
                                 {!! $diary->body !!}
                                 @endif
                                 {!! old('body') !!}
                               </textarea>
                             </div>

                             @if($diary->active == '1')
                             <input type="submit" name='publish' class="btn btn-success" value = "Update" style="float:right; margin-left:10px" />
                             @else
                             <input type="submit" name='publish' class="btn btn-success" value = "Publish" style="float:right; margin-left:10px"/>
                             @endif
                             @role(1)
                             <a type="button" href="{{  url('/diarydelete/'.$diary->id.'?_token='.csrf_token()) }}" class="btn btn-danger" style="float:right">Delete</a>
                             @endrole
                            </form>
                    @endrole
                    @endif
            </h3>
            <h5>{{ $diary->created_at->format('M d,Y \a\t h:i a') }} by Admin</h5>

            <div class="text" style="width:100%; overflow:auto"  >
              <?php echo $diary->body ?>
              <!-- <article>
              {!! str_limit($diary->body, $limit = 100, $end = '....... <a href='.url("/diary/".$diary->slug).'>Read More</a>') !!}
            </article> -->
          </div>
        </div>
    </div>
    @endforeach
    {!! $diarys->render() !!}



                
@endsection
