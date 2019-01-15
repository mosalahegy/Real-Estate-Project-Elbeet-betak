@extends('layouts.app')

@section('title')
    اتصل بنا
@endsection

@section('header')

    <link href="{{asset('custom/css/custom.css')}}" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
@endsection

@section('route')
<li><a href="/contact">اتصل بنا</a></li>
@endsection

@section('content')
<div class="container">
    <div class="row">
            <div class="col-sm-4">
                    <div class="contact-info">
                        <h2 class="title text-center">معلومات الاتصال</h2>
                        <address>
                            <p>{{getSetting('site_name')}}</p>
                            <p>{{getSetting('local_address')}}</p>
                            <p>{{getSetting('country')}}</p>
                            <p>رقم التيلفون: {{getSetting('phone')}}</p>
                            
                            <p>البريد الالكترونى: {{getSetting('email')}}</p>
                        </address>
                        <div class="social-networks">
                            <h2 class="title text-center">شبكات التواصل الاجتماعى</h2>
                            <ul>
                                <li>
                                    <a href="{{getSetting('facebook')}}"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="{{getSetting('twitter')}}"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="{{getSetting('google')}}"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="{{getSetting('youtube')}}"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> 
        
        <div class="col-sm-8">
            <div class="contact-form">
                <h2 class="title text-center">تواصل معنا باستمرار</h2>
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form row" name="contact-form" action='/contact' method="post">
                    {{ csrf_field() }}
                    <div class="form-group col-md-6" style="float:right">
                        <input type="text" name="contact_name" class="form-control" required="required" placeholder="الاسم"  value="{{Illuminate\Support\Facades\Auth::user() ? Illuminate\Support\Facades\Auth::user()->name:''}}">
                    </div>
                    <div class="form-group col-md-6">
                    <input type="email" name="contact_email" class="form-control" required="required" placeholder="البريد الالكترنى" value="{{Illuminate\Support\Facades\Auth::user() ? Illuminate\Support\Facades\Auth::user()->email:''}}">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="contact_subject" class="form-control" required="required" placeholder="الموضوع">
                    </div>
                    <div class="form-group col-md-12">
                        <textarea name="contact_message" id="message" required="required" class="form-control" rows="8" placeholder="محتوى الرسالة"></textarea>
                    </div>                        
                    <div class="form-group col-md-12">
                        <input type="submit" style="background-color:#2ABB9B" name="submit" class="btn btn-primary pull-right" value="ارسال">
                    </div>
                </form>
            </div>
        </div>
           			
    </div>


@endsection
