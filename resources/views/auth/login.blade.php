@extends('layouts.app')

@section('content')

<div class="login-box animated @if (count($errors) > 0) jello @else fadeInDown @endif">
    <div class="login-logo">
        <a href="/"><b>GOS </b></a>
    </div>
  
    <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập hệ thống</p>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {!! Form::open(['url' => URL::current(),'autocomplete'=>'off']) !!}
        <div class="form-group">
            <div class="input-group">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <div class="input-group-addon">
                    <i class="fa fa-user fa-fw"></i>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-addon">
                    <i class="fa fa-lock fa-fw"></i>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" checked> Ghi nhớ
                    </label>
                </div>
            </div>
            <div class="col-xs-6">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
            </div>
        </div>
        {!! Form::close() !!}
        <a href="#">Quên mật khẩu</a><br>
    </div>
</div>
@endsection
