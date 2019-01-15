@extends('layouts.app')

@section('title')
 العقار {{$building->name}}
@endsection

@section('header')
<link rel="stylesheet" href="{{asset('custom/item.css')}}">
<link rel="stylesheet" href="{{asset('custom/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('custom/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('custom/sidebar.css')}}">
@endsection

@section('route')
    <li><a href="/all-buildings">كل العقارات</a></li>
    <li><a href="/all-buildings/{{$building->id}}">{{$building->name}}</a></li>
@endsection


@section('content')


<div class="container-fluid">
    @include('website.sidebar_right');
    <div class='col-md-8 col-sm-8'>
        <div class='content-wrapper' >
            <h1>{{$building->name}}</h1>
            
            @include('website.singlebuilding')
           
        </div>
        <h2>عقارات اخرى</h2>
        <div class='content-wrapper' >           
            @include('website.building',['buildings' => $sameType])
        </div>
        <h2>عقارات  اخرى</h2>
        <div class='content-wrapper' >
            @include('website.building',['buildings' => $sameRent])
        </div>
    </div>
    @include('website.sidebar_left');
</div>

@endsection


@section('footer')
<script src="{{asset('custom/item.js')}}"></script>
<script src="{{asset('custom/jquery-1.11.1.min.js')}}"></script>
@endsection
