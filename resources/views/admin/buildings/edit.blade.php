@extends('admin.layouts.layout')

@section('title')

@endsection

@section('header')
    <link href="{{asset('website/css/style.css')}}" rel="stylesheet" />
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style='font-size:40px'>
            تعديل العقارات 
        </h1>
        <ol class="breadcrumb">
            <li><a href="/adminpanel"><i class="fa fa-dashboard" style='color:#2ABB9B'></i> الرئيسية</a></li>
            <li><a href="/adminpanel/buildings">العقارات</a></li>
            <li class="active"><a href="/adminpanel/users/create"> تعديل العقار {{$building->id}} </a></li>
        </ol>
    </section>
          
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            
                <div class="box">
                <div class="box-header">
                    <h3 class="box-title">نعديل عقار {{$building->id}}</h3>
                </div>
                
                <div class="box-body">
                    <form class="form-horizontal" method="POST" action="/adminpanel/buildings/{{$building->id}}/" enctype="multipart/form-data">
                        <input type='hidden' name='_method' value='PATCH'>
                        @include('admin.buildings.form_edit')
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer')
    <script src="{{ asset('website/js/app.js') }}"></script>
    <script src="{{ asset('website/js/main.js') }}"></script>
    <script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.flexslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/responsive-nav.js') }}"></script>
@endsection