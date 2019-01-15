
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
            <input id="name" type="text" class="form-control" name="name" placeholder="اسم العقار" value="{{ $building->name }}" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
            <input id="price" type="text" class="form-control" name="price" placeholder="سعر العقار" value="{{ $building->price }}" required autofocus>
            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('rooms') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
            <input id="rooms" type="text" class="form-control" placeholder="عدد الغرف" name="rooms" value="{{ $building->rooms }}" required autofocus>

            @if ($errors->has('rooms'))
                <span class="help-block">
                    <strong>{{ $errors->first('rooms') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-2">
            <input id="area" type="text" class="form-control" placeholder="المساحة" name="area" value="{{ $building->area }}" required autofocus>
            @if ($errors->has('area'))
                <span class="help-block">
                    <strong>{{ $errors->first('area') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-2">
            <select name='rent' class='form-control'>
                <option value='100'>نوع العقار -- ايجار- تمليك</option>
                <option value='0' {{$building->rent == 0 ? 'selected' : ''}}>ايجار</option>
                <option value='1' {{$building->rent == 1 ? 'selected' : ''}}>تمليك</option>
            </select>    
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-2">
            <select name='type' class='form-control'>
                <option value='100'>نوع العقار -- منزل ....الخ</option>
                
                <option value='0'  {{$building->type == 0 ? 'selected' : ''}}>منزل عادى</option>
                <option value='1'  {{$building->type == 1 ? 'selected' : ''}}>شقة</option>
                <option value='2'  {{$building->type == 2 ? 'selected' : ''}}>عمارة</option>
                <option value='3'  {{$building->type == 3 ? 'selected' : ''}}>فيلا</option>
                <option value='4'  {{$building->type == 4 ? 'selected' : ''}}>شاليه</option>
                
            </select>    
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-md-8 col-md-offset-2">
            <select name='status' class='form-control'>
                <option value='100'>حالة العقار</option>
                <option value='0' {{$building->status == 0 ? 'selected' : ''}}>حديث --اقل من سنة</option>
                <option value='1' {{$building->status == 1 ? 'selected' : ''}}>قديم -- اكثر من 10 سنين</option>
                <option value='2' {{$building->status == 2 ? 'selected' : ''}}>وسط</option>
            </select>    
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-2">
            <select name='approve' class='form-control'>
                <option value='100'>حالة العقار -- مفعل - غير مفعل</option>
                <option value='0' {{$building->approve == 0 ? 'selected' : ''}}>غير مفعل</option>
                <option value='1' {{$building->approve == 1 ? 'selected' : ''}}>مفعل</option>
            </select>    
        </div>
    </div>

    <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
            <input id="region" type="text" class="form-control" placeholder="خط الطول" name="region"  value="{{ $building->region }}" required autofocus>

            @if ($errors->has('region'))
                <span class="help-block">
                    <strong>{{ $errors->first('region') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('large_desc') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
                <textarea id="large_desc" type="text" class="form-control" rows="8" placeholder="وصف طويل للعقار" name="large_desc" required autofocus>{{ $building->large_desc }}</textarea>
            @if ($errors->has('large_desc'))
                <span class="help-block">
                    <strong>{{ $errors->first('large_desc') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('meta') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
                <textarea id="meta" type="text" class="form-control" rows="4" placeholder="الكلمات الدلاليه" name="meta" required autofocus>{{ $building->meta }}</textarea>
            @if ($errors->has('meta'))
                <span class="help-block">
                    <strong>{{ $errors->first('meta') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('langtude') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
            <input id="langtude" type="text" class="form-control" placeholder="خط الطول" name="langtude"  value="{{ $building->langtude }}" required autofocus>

            @if ($errors->has('langtude'))
                <span class="help-block">
                    <strong>{{ $errors->first('langtude') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
            <input id="latitude" type="text" class="form-control" placeholder="دائرة العرض" name="latitude"  value="{{ $building->latitude }}" required autofocus>

            @if ($errors->has('latitude'))
                <span class="help-block">
                    <strong>{{ $errors->first('latitude') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
            <input id="image" type="file" class="form-control" placeholder="اضافة صورة " name="image"  value="{{ $building->image }}" autofocus>
            @if ($errors->has('image'))
                <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
            @endif
        </div>
    </div>    
    


    <div class="form-group">
        <div class="col-md-8 col-md-offset-2">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-edit" style="color:#FFF;margin-bottom: 1px;"> </i> تعديل العقار
            </button>
        </div>
    </div>   

