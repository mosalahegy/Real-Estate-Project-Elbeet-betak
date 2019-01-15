@extends('layouts.app')


@section('title')
    تسجيل الدخول
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-danger panel-custom">
                <div class="panel-heading panel-custom"><a href="/login">تسجيل الدخول</a></div>
                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="البريد الالكترونى" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-6 col-md-offset-3">
                                <input id="password" type="password" class="form-control" placeholder="كلمة المرور" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="checkbox pull-right">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> تذكرنى
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-chevron-circle-right" style="color:#FFF"></i>  تسجيل الدخول
                                </button>

                                <a class="btn btn-primary" href="{{ route('password.request') }}">
                                    نسيت كلمة المرور ؟                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
