@extends('layouts.app')

@section('title')
    كل العقارات
@endsection

@section('header')
<link rel="stylesheet" href="{{asset('custom/item.css')}}">
<link rel="stylesheet" href="{{asset('custom/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('custom/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('custom/sidebar.css')}}">
@endsection

@section('route')
    <li><a href="/all-buildings">كل العقارات</a></li>
    @if(isset($rent))
        <li><a href="/all-buildings/rent/{{$rent}}">{{rent()[$rent]}}</a></li>
    @endif
    
    @if(isset($type))
        <li><a href="/all-buildings/type/{{$type}}">{{type()[$type]}}</a></li>
    @endif

    @if(isset($searchItems))
        <li><a href="/all-buildings">بحث </a></li>
        @foreach($searchItems as $key => $value)
            <li><a href="search?{{$key}}={{$value}}">{{searchItems()[$key]}} : 
                @if($key == 'type')
                    {{type()[$value]}}
                @elseif($key == 'rent')    
                    {{rent()[$value]}}
                @elseif($key == 'status')
                    {{status()[$value]}}
                @else
                    {{$value}}
            </a></li>
            @endif
        @endforeach
    @endif

@endsection


@section('content')


<div class="container-fluid">
    @include('website.sidebar_left');
    <div class='col-md-8 col-sm-8'>
        <div class='content-wrapper'>
            @include('website.building')
        </div>
    </div>
    @include('website.sidebar_right')
</div>

@endsection


@section('footer')
<script src="{{asset('custom/item.js')}}"></script>
<script src="{{asset('custom/jquery-1.11.1.min.js')}}"></script>
@endsection
