@extends('admin.layouts.layout')

@section('title')
    الاعضاء
@endsection

@section('header')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style='font-size:40px'>
        بيانات الاعضاء
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="/adminpanel"><i class="fa fa-dashboard" style="color:#2ABB9B;"></i> الرئيسية</a></li>
        <li class="active"><a href="/adminpanel/users">التحكم فى الاعضاء</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">التحكم فى بيانات الاعضاء</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th><span style='margin-left: 30px;font-size: 15px;margin-right: -27px;'>#</span></th>
                              <th><span style='margin-left: 85px;font-size: 15px;margin-right: -27px;'>اسم العضو</span></th>
                              <th><span style='margin-left: 85px;font-size: 15px;margin-right: -27px;'>البريد الالكترونى</span></th>
                              <th><span style='margin-left: 85px;font-size: 15px;margin-right: -27px;'>وقت التسجيل</span></th>
                              <th><span style='margin-left: 85px;font-size: 15px;margin-right: -27px;'>اخر تعديل</span></th>
                              <th><span style='margin-left: 85px;font-size: 15px;margin-right: -27px;'>الصلاحيات</span></th>
                              <th><span style='margin-left: 85px;font-size: 15px;margin-right: -27px;'>الخيارات</span></th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                @if(count($users) > 0)
                                
                                @foreach($users as $user)
                                  <tr>
                                    <td>{{$user->id}}</td>
                                    <td><a href='/adminpanel/users/{{$user->id}}'>{{$user->name}}</a></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>
                                    <td>{{$user->admin == 1 ? 'مدير' : 'عضو'}}</td>
                                    <td>
                                      <a href='/adminpanel/users/{{$user->id}}/edit' class='btn btn-success'>تعديل</a>
                                      <a href='/adminpanel/users/{{$user->id}}/delete' class='btn btn-danger'>حذف</a>    
                                    </td>
                                  </tr>
                                  @endforeach
                                @endif

                               
                            </tbody>
                            
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@endsection


@section('footer')
    <!-- DataTables -->
    <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script type='text/javascript'>
    
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange':  true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })

      /*
      var lastIdx = null;
      $('#data thead th').each(function(){
        if($(this).index() < 5 && $(this).index() != 2 && $(this).index() != 3){
          var classname = $(this).index() == 6 ? 'date' : 'dateslash';
          var title = $(this).html();
          $(this).html('<input type="text" class="' + classname + '"data-value="' + $(this).index() + '"placeholder"= البحث' + title + '" />');
          

        }else if($(this).index()  == 2){
          $(this).html('<select><option value="0">مفعل</option><option value="1">غير مفعل</option></select>' );
        }else if($(this).index()  == 3){
          $(this).html('<select><option value="0">مفعل</option><option value="1">غير مفعل</option></select>' );
        }
        



      });

      var table = $('#data').DataTable({

        proccessing: true,
        serverSide: true,
        ajax:'adminpanel/users/data',
        columns:  [
          {data: 'id',name: 'id'},
          {data: 'name',name: 'name'},
          {data: 'email',name: 'email'},
          {data: 'created_at',name: 'created_at'},
          {data: 'updated_at',name: 'updated_at'},
          {data: 'admin',name: 'admin'},
          {data: 'control',name: ''}

        ],
        "language": {
            "url" : "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
        },
        "stateSave": false,
        "responsive": true,
        "order":  [[0,'desc']],
        "pagingType": "full_numbers",
        "aLengthMenu":  [
          [25, 50, 100, 200, -1],
          [25, 50, 100, 200, 'All'],

        ],
        iDisplayLength: 25,
        fixedHeader:true,
        "oTableTools":  {
            "aButtons":[
              {
                "sExtends": "csv",
                "sButtonText":  "ملف اكسل",
                "sChartSet":  "utf16le"
              },
              {
                "sExtends": "copy",
                "sButtonText" : "نسخ البيانات"
              },
              {
                "sExtends": "print",
                "sButtonText":  "طباعه",
                "nColumns": "visible"
              }
            ],
            "sSwfPath": ""
        },

        "dom":  "",
        initComplete:function()
        {
          var r = $('#data tfoot tr');
          r.find('th').each(function(){
            $(this).css('padding',8);
          });
          $('#data thead').append(r);
          $('#search_0').css('text-align','center');
        }

      });

      table.columns().eq(0).each(function(colIdx){
        $('input',  table.column(colIdx).header()).on('keyup change',function(){
          table.column(colIdx).search(this.value).draw();
        });
      });

      table.columns().eq(0).each(function(colIdx){
        $('select',  table.column(colIdx).header()).on('change',function(){
          table.column(colIdx).search(this.value).draw();
        });

        $('select',  table.column(colIdx).header()).on('click',function(){
          e.stopPropagetion();
        });

      });
      

      $('#data tbody').on('mousehover','td',function(){
        var colIdx = table.cell(this).index().column;
        if(colIdx !== lastIdx)
        {
          $(table.cells().nodes()).removeClass('highlight');
          $(table.column(colIdx).nodes()).addClass('highlight');
          
        }
      }).on('mouseleave',function(){
        $(table.cells().nodes()).removeClass('highlight');        
      
      
      });*/

  </script>
@endsection