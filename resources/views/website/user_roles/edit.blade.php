@extends('layouts.app')

@section('title')
    تعديل العقار {{$building->name}}
@endsection

@section('header')

 
<link rel="stylesheet" href="{{asset('custom/item.css')}}">
<link rel="stylesheet" href="{{asset('custom/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('custom/sidebar.css')}}">
    
@endsection

@section('route')
    <li><a href="/all-buildings">الرئيسية</a></li>
    <li class="active"><a href="/user/buildings/create">تعديل العقارات </a></li>
@endsection


@section('content')

<div class="container">
    
    <div class='col-md-10 col-sm-10'>
        <h1>قم بالتعديل على عقارك</h1>
        <div class='content-wrapper' style="height:880px"><br>
            <form class="form-horizontal" method="POST" action="/user/building/{{$building->id}}" enctype="multipart/form-data">
                <input type='hidden' name='_method' value='PATCH'>
                @include('website.user_roles.form_edit')
            </form>
        </div>
    </div>
    @include('website.sidebar')
</div>

@endsection


@section('footer')
<script src="{{asset('custom/item.js')}}"></script>
<script src="{{asset('custom/jquery-1.11.1.min.js')}}"></script>
@endsection