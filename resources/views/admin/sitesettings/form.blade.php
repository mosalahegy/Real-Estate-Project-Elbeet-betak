
    {{ csrf_field() }}
    @foreach($siteSettings as $sitesetting)
    <div class="form-group{{ $errors->has($sitesetting->settingname) ? ' has-error' : '' }}">
        <div class="col-md-10 col-md-offset-0">
                @if($sitesetting->type == 0)
                    <input id="{{$sitesetting->settingname}}" type="text" class="form-control" name="{{$sitesetting->settingname}}" value="{{ $sitesetting->settingvalue }}" required autofocus>
                @elseif($sitesetting->type == 1)
                    <textarea id="{{$sitesetting->settingname}}" type="text" class="form-control" rows="10" name="{{$sitesetting->settingname}}" required autofocus>{{ $sitesetting->settingvalue }}</textarea>
                @elseif($sitesetting->type == 2)
                    <input id="{{$sitesetting->settingname}}" type="file" class="form-control" name="{{$sitesetting->settingname}}" required autofocus />
                @endif                 
               
                @if ($errors->has($sitesetting->settingname))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            </div>
        <label for='{{$sitesetting->settingname}}' class="col-md-2 col-md-0">{{$sitesetting->id}} - {{$sitesetting->slug}}</label>
        
    </div>
    @endforeach

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-refresh" style="color:#FFF;margin-bottom: 1px;"> </i>  حفظ الاعدادات
            </button>
            <a class='btn btn-info' href='/adminpanel/sitesettings/create'><i class='fa fa-plus-circle'></i> اضافه جديد</a>
            
        </div>
    </div>   