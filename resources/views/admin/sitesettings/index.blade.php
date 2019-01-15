@extends('admin.layouts.layout')

@section('title')
    اعدادات الموقع
@endsection

@section('header')

    <link href="{{asset('website/css/style.css')}}" rel="stylesheet" />

@endsection


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style='font-size:40px'>
        اعدادات الموقع
      </h1>
      <ol class="breadcrumb">
        <li><a href="/adminpanel"><i class="fa fa-dashboard" style="color:#2ABB9B;"></i> الرئيسية</a></li>
        <li class="active"><a href="/adminpanel/sitesettings">تعديل اعدادات الموقع</a></li>
      </ol>
    </section>

    <section>
        
        <section class="content">
        <div class="row">
            <div class="col-xs-12">
            
                <div class="box">
                <div class="box-header">
                    <h3 class="box-title">الاعدادات</h3>
                </div>
                
                <div class="box-body">
                    <form class="form-horizontal" method="POST" action="/adminpanel/sitesettings" enctype='multipart/form-data'>
                        @include('admin.sitesettings.form')
                    </form>
                </div>
            </div>
        </div>
    </section>
    

@endsection


@section('footer')
    <!-- DataTables -->
    <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

  </script>
@endsection