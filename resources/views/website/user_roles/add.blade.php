@extends('layouts.app')

@section('title')
    اضافة عقار جديد
@endsection

@section('header')

 
<link rel="stylesheet" href="{{asset('custom/item.css')}}">
<link rel="stylesheet" href="{{asset('custom/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('custom/sidebar.css')}}">
    
@endsection

@section('route')
    <li><a href="/all-buildings">الرئيسية</a></li>
    <li class="active"><a href="/user/buildings/create">اضافة عقار جديد</a></li>
@endsection


@section('content')

<div class="container-fluid">
    @include('website.sidebar_left');
    <div class='col-md-8 col-sm-8'>
        <div class='content-wrapper' style="height:800px">
            <form action="/user/buildings/create" method="POST" enctype="multipart/form-data">
                @include('website.user_roles.form_add')
            </form>
        </div>
    </div>
    @include('website.sidebar_right');
    
</div>

@endsection


@section('footer')
<script src="{{asset('custom/item.js')}}"></script>
<script src="{{asset('custom/jquery-1.11.1.min.js')}}"></script>
@endsection