
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('settingname') ? ' has-error' : '' }}">
        <div class="col-md-6 col-md-offset-3">
            <input id="settingname" type="text" class="form-control" name="settingname" placeholder="اسم الاعداد" value="{{ old('settingname') }}" required autofocus>
            @if ($errors->has('settingname'))
                <span class="help-block">
                    <strong>{{ $errors->first('settingname') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('settingvalue') ? ' has-error' : '' }}">

        <div class="col-md-6 col-md-offset-3">
            <input id="settingvalue" type="text" class="form-control" name="settingvalue" placeholder="محتوى الاعداد" value="{{ old('settingvalue') }}" required>

            @if ($errors->has('settingvalue'))
                <span class="help-block">
                    <strong>{{ $errors->first('settingvalue') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">

        <div class="col-md-6 col-md-offset-3">
            <input id="slug" type="text" class="form-control" placeholder="رمز اظهار الاعداد" name="slug" required>

            @if ($errors->has('slug'))
                <span class="help-block">
                    <strong>{{ $errors->first('slug') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">

        <div class="col-md-6 col-md-offset-3">
            <select name='type' class='form-control'>
                <option value='...'>نوع الاعداد نصى قصير - نصى طويل </option>
                <option value='0'>نصى قصير</option>
                <option value='1'>نصى طويل</option>
            </select>
            @if ($errors->has('slug'))
                <span class="help-block">
                    <strong>{{ $errors->first('slug') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-info">
                <i class="fa fa-plus-circle" style="color:#FFF;margin-bottom: 1px;"> </i>  تسجيل الاعداد 
            </button>
        </div>
    </div>   
