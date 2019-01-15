@if(Session::has('flash_message'))
    <div class='container'>
        <div class='col-md-8 col-md-offset-2'>
            <div style='margin-top:10px'class='text-center alert alert-success'>
                <h4 style='margin-top:10px'>{{Session::get('flash_message')}}<h4>
            </div>
        </div>
    </div>

@endif

@if(Session::has('error_message'))
    <div class='container'>
        <div class='col-md-8 col-md-offset-2'>
            <div style='margin-top:10px'class='text-center alert alert-danger'>
                <h4 style='margin-top:10px'>{{Session::get('error_message')}}<h4>
            </div>
        </div>
    </div>

@endif