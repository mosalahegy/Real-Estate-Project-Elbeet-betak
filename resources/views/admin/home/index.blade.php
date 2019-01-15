@extends('admin.layouts.layout')

@section('title')
    الصفحة الرئيسية
@endsection


@section('content')
  <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-home"></i>
            لوحة التحكم
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="/adminpanel"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
            <li class="active"><a href="/adminpanel">الرئيسية</a></li>
          </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 pull-right">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
    
                <div class="info-box-content">
                        <h4>كل الاعضاء</h4>
                        <span class="info-box-number">{{$users}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12 pull-right">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-building-o"></i></span>
    
                <div class="info-box-content">
                        <h4>العقارات المفعله</h4>
                        <span class="info-box-number">{{$building_app}}</span>
                    
                
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
    
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
    
            <div class="col-md-3 col-sm-6 col-xs-12 pull-right">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-building"></i></span>
    
                <div class="info-box-content">
                        <h4>العقارات الغير مفعله</h4>
                        <span class="info-box-number">{{$building_unapp}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-envelope-o"></i></span>
    
                <div class="info-box-content">
                        <h4>الرسائل</h4>
                        <span class="info-box-number">{{$messages}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
    
        
    
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-4">
             
                <div style='padding-left:0;padding-right:0' class="col-md-12">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title pull-right">الاعضاء الجدد</h3>
    
                      <div class="pull-left">
                        <span class="label label-danger">8 اعضاء</span>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="col-md-12">
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        @foreach($latestUsers as $latestUser)
                            
                            <li>
                                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" alt="User Image">
                                <a style='font-size:16px' class="users-list-name" href="/adminpanel/users/{{$latestUser->id}}">{{$latestUser->name}}</a>
                                <span class="users-list-date">{{$latestUser->created_at}}</span>
                            </li>    
                            
                        @endforeach
                      </ul>
                      <!-- /.users-list -->
                    </div>
                </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="/adminpanel/users">كل الاعضاء</a>
                    </div>
                    <!-- /.box-footer -->
                  </div>
                  <!--/.box -->
                </div>
            </div>
            <div class="col-md-8">
                              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title pull-right">أخر الرسائل</h3>
        
                      <div class="pull-left">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="table-responsive">
                        <table class="table no-margin">
                          <thead>
                          <tr>
                            <th>#</th>
                            <th>صاحب الرسالة</th>
                            <th>البريد الالكترونى</th>
                            <th>موضوع الرسالة</th>
                            <th>محتوى الرسالة</th>
                            <th>وقت الارسال</th>
                          </tr>
                          </thead>
                          <tbody>
                          
                          @foreach($latestMsgs as $latestMsg)
                            <tr>
                                <td><a href="/adminpanel/contact/{{$latestMsg->id}}/edit">{{$latestMsg->id}}</a></td>
                                <td>{{$latestMsg->contact_name}}</td>
                                <td><span class="label label-success">{{$latestMsg->contact_email}}</span></td>
                                <td>{{$latestMsg->contact_subject}}</td>
                                <td>{{str_limit($latestMsg->contact_message,20)}}</td>
                                <td>{{$latestMsg->created_at}}</td>
                            </tr>
                          @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                      <a href="adminpanel/contact" class="btn btn-info btn-flat pull-right">كل الرسائل</a>
                    </div>
                    <!-- /.box-footer -->
                  </div>
                  <!-- /.box -->
            </div>
            </div>
         
            <div class='row'>
                
                
              <!-- /.box -->
                <div class="col-md-12 pull-right">
                    <!-- PRODUCT LIST -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                        <h3 class="box-title pull-right">اخر العقارات المضافة</h3>
            
                        <div class="pull-left">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            
                           @foreach($latestBuildings as $latestBuilding)                           
                                <li class="item">
                                <div class="product-img">
                                    <img src="{{asset('storage/storage/images_upload/' . $latestBuilding->image)}}" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="/adminpanel/buildings/{{$latestBuilding->id}}/edit" style='margin-right:20px;' class="product-title">{{$latestBuilding->name}}
                                    <span  class="label label-success pull-right">{{$latestBuilding->price}} ج.م</span></a>
                                    
                                        <span class="product-description">
                                            {{$latestBuilding->large_desc}}
                                        </span>
                                   
                                </div>
                                </li>
                                <!-- /.item -->
                            @endforeach
                        </ul>
                        
                        </div>
                        
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                        <a href="/adminpanel/buildings" class="uppercase">كل العقارات</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
              <!-- /.box -->
                </div>
            </div>  
                <!-- /.col -->
              
              <!-- /.row -->
            


 
          <!-- /.row -->
        </section>
        <!-- /.content -->
      
@endsection