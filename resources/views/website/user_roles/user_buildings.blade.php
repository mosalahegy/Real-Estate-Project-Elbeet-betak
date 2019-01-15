@extends('layouts.app')

@section('title')
    اظهار العقارات
@endsection

@section('header')
<link rel="stylesheet" href="{{asset('custom/item.css')}}">
<link rel="stylesheet" href="{{asset('custom/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('custom/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('custom/sidebar.css')}}">
@endsection

@section('route')
    <li><a href="/all-buildings">كل العقارات</a></li>
    <li class="active"><a href="/user/{{Auth::user()->id}}/buildings">عقاراتى</a></li>
    
@endsection

@section('content')
<div class="container-fluid">
    @include('website.sidebar_left');
    <div class='col-md-8 col-sm-8'>
        <div class='content-wrapper' >
            @include('website.building')
        </div>
    </div>
    @include('website.sidebar_right');
</div>
@endsection

@section('footer')
<script src="{{asset('custom/item.js')}}"></script>
<script src="{{asset('custom/jquery-1.11.1.min.js')}}"></script>
@endsection
