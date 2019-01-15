
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="col-md-6 col-md-offset-3">
            <input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ $user->name }}" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

        <div class="col-md-6 col-md-offset-3">
            <input id="email" type="email" class="form-control" name="email" placeholder="البريد الالكترونى" value="{{ $user->email }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

        <div class="col-md-6 col-md-offset-3">
            <input id="password" type="password" class="form-control" placeholder="كلمة المرور" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">

        <div class="col-md-6 col-md-offset-3">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="إعادة كلمة المرور" required>
        </div>
    </div>
    <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <select class='form-control'>
                    <option value='1' {{ $user->admin == 1 ? 'selected' : '' }}>مدير</option>
                    <option value='0' {{ $user->admin == 0 ? 'selected' : '' }}>عضو</option>
                </select>    
            </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-user" style="color:#FFF;margin-bottom: 1px;"> </i>  تعديل العضو 
            </button>
        </div>
    </div>   
