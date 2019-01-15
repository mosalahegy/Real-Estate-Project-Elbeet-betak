<div class='col-md-2 col-sm-2'>
    @if(Auth::user())
        <div class="row">
                <div class='content-wrapper' style="min-height:300px;">                
                        <div class="profile">                        
                                <div class="profile-sidebar">
                                    <h2 style='border-radius:5px;background-color:#2ABB9B;color:#FFF;padding:5px 10px;' > العقارات</h2>
                                    <div class="profile-usermenu">
                                        <ul class="nav">
                                            <li class="{{setLinkActive(['profile', Auth::user()->id, 'edit'])}}">
                                                <a href="/profile/{{Auth::user()->id}}/edit">
                                                <i class="fa fa-user"></i>
                                                    تعديل المعلومات الشخصية </a>
                                            </li>
                                            <li class="{{ setLinkActive( ['user', Auth::user()->id, 'appbuildings'] ) }}">
                                                <a href="/user/{{Auth::user()->id}}/appbuildings">
                                                <i class="fa fa-home"></i>
                                                    عقاراتى </a>
                                            </li>

                                            <li class="{{ setLinkActive( ['user', Auth::user()->id, 'unappbuildings'])}}">
                                                <a href="/user/{{Auth::user()->id}}/unappbuildings">
                                                <i class="fa fa-ban"></i>
                                                    عقارات قيد التفعيل </a>
                                            </li>

                                            <li class="{{setLinkActive(['user', 'buildings', 'create'])}}">
                                                <a href="/user/buildings/create">
                                                <i class="fa fa-plus"></i>
                                                    اضافة عقار </a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <!-- END MENU -->
                                </div>                        
                        </div>
                             
                </div>
            </div>
        @endif
</div>

    
