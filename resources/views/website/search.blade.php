<div class="container">
        <div class="row">
                <div class='content-wrapper' >                
                    <div class="profile">                        
                        <div class="profile-sidebar">
                            <h2 style='border-radius:5px;background-color:#2ABB9B;color:#FFF;padding:7px 20px;' > بحث </h2>
                            <div class="col-md-12 col-md-offset-0">
                                <div class="profile-usermenu">
                                    <form action='/all-buildings/search' method="GET">
                                        {{ csrf_field() }}
                                        <div class='form-group'>
                                            <input type="text" class='form-control' name='name' placeholder="الاسم">
                                        </div>
                                        <div class='form-group'>
                                            <input type="text" class='form-control' name='pricefrom' placeholder="السعر من">
                                        </div>
                                        <div class='form-group'>
                                            <input type="text" class='form-control' name='priceto' placeholder="السعر الى">
                                        </div>
                                        <div class='form-group'>
                                            <input type="text" class='form-control' name='area' placeholder="المساحة">
                                        </div>  
                                        <div class='form-group'>
                                            <input type="text" class='form-control' name='region' placeholder="المنطقة">
                                        </div>  
                                        <div class='form-group'>
                                            <select name='rooms' class="form-control">
                                                <option value="">عدد الغرف</option>
                                                @for($i=2; $i<30;$i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        
                                        <div class='form-group'>
                                            <select name='type' class="form-control">
                                                <option value="">نوع العقار</option>
                                                @for($i=0; $i<5;$i++)
                                                    <option value='{{$i}}'>{{type()[$i]}}</option>
                                                @endfor
                                            </select>
                                        </div> 
                                        <div class='form-group'>
                                            <select name='rent' class="form-control">
                                                <option value="">نوع العمليه</option>
                                                @for($i=0; $i<2;$i++)
                                                    <option value='{{$i}}'>{{rent()[$i]}}</option>
                                                @endfor
                                            </select>
                                        </div>    
                                        <div class='form-group'>
                                            <select name='status' class="form-control">
                                                <option value="">حالة العقار</option>
                                                @for($i=0; $i<3;$i++)
                                                    <option value='{{$i}}'>{{status()[$i]}}</option>
                                                @endfor
                                            </select>
                                        </div>                              
                                        <button type='submit' class="form-control btn btn-info" >
                                            بحث <i class='fa fa-search'></i>
                                        </button>
                                    </form>  
                                </div>   
                            </div>  
                        </div>
                        
                    </div>
                </div> 
            </div>
</div>

