@extends('layouts.app')

@section('title')
   {{$user->name}}
@endsection

@section('header')
  
    <link href="{{asset('website/css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('custom/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('custom/sidebar.css')}}">
@endsection

    

@section('route')
    <li><a href="/adminpanel"><i class="fa fa-dashboard" style='color:#2ABB9B'></i> الرئيسية</a></li>
    <li><a href="">البيانات الشخصية</a></li>
    <li class="active"><a href="/profile/{{$user->id}}/edit">تعديل بيانات {{$user->name}}</a></li>
@endsection

@section('content')
<div class="container-fluid">
    @include('website.sidebar_left');
    <div class='col-md-8 col-sm-8'>
        
        <div class='content-wrapper' style="min-height:300px;" >
            <div class="row">
                <div class="box">
                    <br>                          
                    <div class="box-body">
                        <form class="form-horizontal" method="POST" action="/profile/{{$user->id}}">
                            <input type='hidden' name='_method' value='PATCH'>
                            @include('website.profile.form_edit')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('website.sidebar_right');
</div> 
@endsection


@section('footer')
   
@endsection