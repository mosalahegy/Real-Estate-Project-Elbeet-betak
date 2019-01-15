
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
            <input id="name" type="text" class="form-control" name="name" placeholder="اسم العقار" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">

        <div class="col-md-8 col-md-offset-2">
            <input id="price" type="text" class="form-control" name="price" placeholder="سعر العقار" value="{{ old('price') }}" required autofocus>

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('rooms') ? ' has-error' : '' }}">

        <div class="col-md-8 col-md-offset-2">
            <input id="rooms" type="text" class="form-control" placeholder="عدد الغرف" name="rooms" value="{{ old('rooms') }}" required autofocus>

            @if ($errors->has('rooms'))
                <span class="help-block">
                    <strong>{{ $errors->first('rooms') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-2">
            <input id="area" type="text" class="form-control" placeholder="المساحة" name="area" value="{{ old('area') }}" required autofocus>

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
                    <option value='0'>ايجار</option>
                    <option value='1'>تمليك</option>
                </select>    
            </div>
    </div>

    <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
                <select name='type' class='form-control'>
                    <option value='100'>نوع العقار -- منزل ....الخ</option>
                    <option value='0'>منزل عادى</option>
                    <option value='1'>شقة</option>
                    <option value='2'>عمارة</option>
                    <option value='3'>فيلا</option>
                    <option value='4'>شاليه</option>
                </select>    
            </div>
    </div>

    <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
                <select name='status' class='form-control'>
                    <option value='100'>حالة العقار</option>
                    <option value='0'>حديث --اقل من سنة</option>
                    <option value='1'>قديم -- اكثر من 10 سنين</option>
                    <option value='2'>وسط</option>
                </select>    
            </div>
    </div>
    @if(!isset($user))
        <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <select name='approve' class='form-control'>
                        <option value='100'>حالة العقار -- مفعل - غير مفعل</option>
                        <option value='0'>غير مفعل</option>
                        <option value='1'>مفعل</option>
                    </select>    
                </div>
        </div>
    @endif
    <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">

        <div class="col-md-8 col-md-offset-2">
            <input id="region" type="text" class="form-control" placeholder="المنطقة" name="region" value="{{ old('region') }}" required autofocus>

            @if ($errors->has('region'))
                <span class="help-block">
                    <strong>{{ $errors->first('region') }}</strong>
                </span>
            @endif
        </div>
    </div>
    @if(!isset($user))
        <div class="form-group{{ $errors->has('small_desc') ? ' has-error' : '' }}">
            <div class="col-md-8 col-md-offset-2">
                    <textarea id="small_desc" type="text" class="form-control" rows="3" placeholder="وصف قصير للعقار" name="small_desc" required autofocus>{{ old('small_desc') }}</textarea>
                @if ($errors->has('small_desc'))
                    <span class="help-block">
                        <strong>{{ $errors->first('small_desc') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    @endif
    <div class="form-group{{ $errors->has('large_desc') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
                <textarea id="large_desc" type="text" class="form-control" rows="8" placeholder="وصف طويل للعقار" name="large_desc" required autofocus>{{ old('large_desc') }}</textarea>
            @if ($errors->has('large_desc'))
                <span class="help-block">
                    <strong>{{ $errors->first('large_desc') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('meta') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
                <textarea id="meta" type="text" class="form-control" rows="4" placeholder="الكلمات الدلاليه" name="meta" required autofocus>{{ old('meta') }}</textarea>
            @if ($errors->has('meta'))
                <span class="help-block">
                    <strong>{{ $errors->first('meta') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('langtude') ? ' has-error' : '' }}">

        <div class="col-md-8 col-md-offset-2">
            <input id="langtude" type="text" class="form-control" placeholder="خط الطول" name="langtude"  value="{{ old('langtude') }}" required autofocus>

            @if ($errors->has('langtude'))
                <span class="help-block">
                    <strong>{{ $errors->first('langtude') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">

            <div class="col-md-8 col-md-offset-2">
                <input id="latitude" type="text" class="form-control" placeholder="دائرة العرض" name="latitude"  value="{{ old('latitude') }}" required autofocus>

                @if ($errors->has('latitude'))
                    <span class="help-block">
                        <strong>{{ $errors->first('latitude') }}</strong>
                    </span>
                @endif
            </div>
        </div>

    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">

        <div class="col-md-8 col-md-offset-2">
            
            <input id="image" type="file" class="form-control" placeholder="اضافة صورة " name="image"  value="{{ old('image') }}" autofocus>
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
                <i class="fa fa-home" style="color:#FFF;margin-bottom: 1px;"> </i>  اضافة عقار جديد
            </button>
        </div>
    </div>   

