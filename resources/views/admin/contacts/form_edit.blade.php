
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('contact_name') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
            <input id="contact_name" type="text" class="form-control" name="contact_name" placeholder="اسم المرسل" value="{{ $contact->contact_name }}" required autofocus>
            @if ($errors->has('contact_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('contact_name') }}</strong>
                </span>
            @endif
        </div>
    </div>



   
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('contact_email') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
            <input id="contact_email" type="text" class="form-control" name="contact_email" placeholder="البريد الالكترونى" value="{{ $contact->contact_email }}" required autofocus>
            @if ($errors->has('contact_email'))
                <span class="help-block">
                    <strong>{{ $errors->first('contact_email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    
   
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('contact_subject') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
            <input id="contact_subject" type="text" class="form-control" name="contact_subject" placeholder="موضوع الرسالة" value="{{ $contact->contact_subject }}" required autofocus>
            @if ($errors->has('contact_subject'))
                <span class="help-block">
                    <strong>{{ $errors->first('contact_subject') }}</strong>
                </span>
            @endif
        </div>
    </div>


    
    <div class="form-group{{ $errors->has('contact_message') ? ' has-error' : '' }}">
        <div class="col-md-8 col-md-offset-2">
                <textarea id="contact_message" type="text" class="form-control" rows="3" placeholder="محتوى الرسالة" name="contact_message" required autofocus>{{ $contact->contact_message }}"</textarea>
            @if ($errors->has('contact_message'))
                <span class="help-block">
                    <strong>{{ $errors->first('contact_message') }}</strong>
                </span>
            @endif
        </div>
    </div>

    


    <div class="form-group">
        <div class="col-md-8 col-md-offset-2">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-edit" style="color:#FFF;margin-bottom: 1px;"> </i>  تعديل الرسالة
            </button>
        </div>
    </div>   

