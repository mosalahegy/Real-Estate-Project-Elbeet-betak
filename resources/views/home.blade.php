@extends('layouts.app')

@section('title')
    مرحبا بك
@endsection
    
@section('header')
<style>
    
    .banner
    {
        background: url("{{asset('/storage/main_site_setting_image/' . getSetting('main_slider'))}}") no-repeat center;
        min-height: 500px;
        width: 100%;
        -webkit-background-size: 100%;
        -moz-background-size: 100%;
        -o-background-size: 100%;
        background-size: 100%;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        padding-bottom: 100px;
    }
</style>
@endsection



@section('content')

    <div class="banner text-center">
        <div class="container">
            <div class="banner-info">
                <h1></h1>
                <div class='row'>
                    
                    <div class='col-md-6'>
                        <textarea class="form-control" placeholder="الرسالة"></textarea>
                    </div>
                    <div class='col-md-6 pull-right'>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="البريد الالكترونى">                           
                        </div> 
                    </div>
                    <div class='col-md-6'>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="الاسم عشارى">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href='/user/buildings/create' class="btn btn-block btn-success">اضف عقارك</a>
                    
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-primary btn-block" href="about.html">ارسال</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        

    

@endsection


@section('footer')
    <script src="{{asset('custom/jquery-1.11.1.min.js')}}"></script>
@endsection
