@extends('layouts.app')

@section('content')
<h2>TAMBAH USER</h2>
<div class="x_title">
</div>

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/create') }}">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">E-mail</label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" name="email" >

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="password" class="form-control" name="password_confirmation">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary">Batal</button>
            <button type="submit" class="btn btn-success">Register</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
        </div>

    </form>

@endsection
