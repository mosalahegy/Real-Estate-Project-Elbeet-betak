<?php

function status()
{
    $array = [
        'حديث -- اقل من سنة',
        'قديم -- اكثر من 10 سنين',
        'وسط'
    ];
    return $array;
}


function rent()
{
    $array = [
        'ايجار',
        'تمليك'
    ];
    return $array;
}


function searchItems()
{
    return [
        'name'          => 'الاسم',
        'pricefrom'     => 'السعر من',
        'priceto'       => 'السعر ألى',
        'area'          => 'المساحة',
        'region'        => 'المنطقة',
        'rooms'         => 'عدد الغرف',
        'type'          => 'النوع',
        'rent'          => 'نوع العمليه',
        'status'        => 'الحالة'
    ];
}

function type()
{
    $array = [
        'منزل عادى',
        'شقة', 
        'عمارة', 
        'فيلا', 
        'شاليه'
    ];
    return $array;
}

function approve()
{
    $array = [
        'غير مفعل',
        'مفعل'
    ];
    return $array;
}
function getSetting($settingname)
{
    $settings = DB::select('SELECT * FROM `site_settings` WHERE `settingname` = ?',[$settingname]);
    foreach ($settings as $setting) {
        return $setting->settingvalue;
    }
}
function getImage($imgName)
{
    return asset('/public/storage/storage/images_upload/'. $imgName);
}

function getLastFiveMessages()
{
    $messages =  App\Contact::orderBy('id','desc')->take(5)->get();
    return $messages;
}

function setLinkActive($array,$className = 'active')
{
    if(!empty($array))
    {
        $component_arr = [];
        
        foreach($array as $key => $url)
        {
            
            if(Request::segment($key+1) == $url)
            {
                $component_arr[] = $url;
            }
        }
        if( count($component_arr) == count( Request::segments() ) )
        {
            if(isset($component_arr[0]))
                return $className;
        }
        
    }
}