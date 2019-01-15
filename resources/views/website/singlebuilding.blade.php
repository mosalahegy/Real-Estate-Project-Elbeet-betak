<div class="btn-group" role="group">
    <a href="/all-buildings/search?pricefrom=0&priceto={{$building->price}}" class='btn btn-default'>
        السعر : {{$building->price}}
    </a>
    <a href="/all-buildings/search?type={{$building->type}}" class='btn btn-default'>
        النوع : {{type()[$building->type]}}
    </a>
    <a href="/all-buildings/search?area={{$building->area}}" class='btn btn-default'>
        ألمساحة : {{$building->area}}
    </a>
    <a href="/all-buildings/search?region={{$building->region}}" class='btn btn-default'>
        المنقطة : {{$building->region}}
    </a>
    <a href="/all-buildings/search?status={{$building->status}}" class='btn btn-default'>
        الحالة : {{status()[$building->status]}}
    </a>
    <a href="/all-buildings/search?rent={{$building->rent}}" class='btn btn-default'>
        العملية : {{rent()[$building->rent]}}
    </a>
    <a href="/all-buildings/search?rooms={{$building->rooms}}" class='btn btn-default'>
        عدد الغرف : {{$building->rooms}}
    </a>
</div>
<div class='image' style="height:700px;margin-top:10px;">
    <img style='width:100%;height:100%;border:1px solid #EEE;padding:5px' src="{{asset('storage/images_upload/' . $building->image)}}" class="img-responsive" alt="Product Image" />                            
</div>

<p style='margin-top:20px;font-size:17px'>
    {!!nl2br($building->large_desc)!!}
</p>