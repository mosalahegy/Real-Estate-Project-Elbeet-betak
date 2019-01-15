
@if(count($buildings) > 0)
    @foreach($buildings as $key => $building)
        @if($key % 3 == 0 && $key != 0)
            <div class="clear-fix"></div>
        @endif
            <div class="col-sm-4 pull-right" style="margin-top:15px;">
                <article class="col-item">
                    <div class="photo">
                        <div class="options">
                            <button class="btn btn-default" type="submit" data-toggle="tooltip" data-placement="top" title="اضافة الى المفضلة">
                                <a href='' ><i class="fa fa-heart"></i></a>
                            </button>
                            <button class="btn btn-default" type="submit" data-toggle="tooltip" data-placement="top" title="المراجعه مع المالك">
                                <a href='' ><i class="fa fa-exchange"></i></a>
                            </button>
                            <button class="btn btn-default" type="submit" data-toggle="tooltip" data-placement="top" title="تعديل العقار ">
                                <a href='/user/building/{{$building->id}}/edit' ><i class="fa fa-edit"></i></a>
                            </button>
                        </div>
                        <div class="options-cart">
                            <button class="btn btn-default" title="شرا العقار">
                                <a href=''><span class="fa fa-shopping-cart"></span></a>
                            </button>
                        </div>
                        <div class='image' style="height:250px;margin-top:10px;">
                            <img style='width:100%;height:100%;border:1px solid #EEE;padding:2px' src="{{asset('storage/storage/images_upload/' . $building->image)}}" class="img-responsive" alt="Product Image" />                            
                        </div>
                    </div>
                    <div class="info">
                        <div class="row">
                            <div class="row">
                                <h3 class="col-md-12">{{ $building->name }}<h3>    
                            </div>
                            
                            <div class="price-details col-md-12">
                                <p class="details">
                                    {{str_limit($building->small_desc,100)}}
                                </p>
                                <br>
                                <div class="row">
                                    <div class="col-md-5">
                                        <a href="" style="margin-bottom:10px" class="btn btn-info pull-left">{{rent()[$building->rent]}}</i></a>
                                    </div>
                                    <div class="col-md-7">
                                        <span title='السعر' style="margin-bottom:10px" class="price-new">{{$building->area}} متر  </span>
                                   </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        @if($building->approve == 1)
                                            <a href="/all-buildings/{{$building->id}}" style="margin-bottom:10px" class="btn btn-info pull-left">المزيد.. <i class='fa fa-arrow-circle-o-left'></i></a>   
                                        @else
                                        <a style="margin-bottom:10px" class="btn btn-danger pull-left">فى انتظار التفعيل</a>                                               
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <span title='السعر' class="price-new">{{$building->price}} ج.م  </span>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>   

    @endforeach
    @if(!isset($check))
        {{ $buildings->links() }}
    @endif
    
    <div class="clear-fix"></div>    
@else
<div class='alert alert-danger'>
عذرا لا يوجد حاليا اى عقارات بهذا النوع    
</div>    
@endif
