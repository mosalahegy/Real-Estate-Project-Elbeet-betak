<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteSetting;
use DB;

class SiteSettingController extends Controller
{
    //
    public function index()
    {   //


        $siteSettings = SiteSetting::all();
        //DB::table('site_settings')->get();
        return view('admin.sitesettings.index',compact('siteSettings'));
    }


    public function create()
    {
        return view('admin.sitesettings.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'settingname'   => 'required|unique:site_settings|min:3',
            'slug'          => 'required|unique:site_settings|min:3',
            'settingvalue'  => 'required|min:3',
            'type'          => 'required'

        ]);
/*
        $sitesetting = new SiteSetting();
        $sitesetting->settingname = $request->input('settingname');
        $sitesetting->slug = $request->input('slug');
        $sitesetting->settingvalue = $request->input('settingvalue');
        $sitesetting->type = $request->input('type');
        $sitesetting->save();
*/
        DB::table('site_settings')->insert([
            
            'settingname'   =>  $request->input('settingname'), 
            'slug'          =>  $request->input('slug'), 
            'settingvalue'  =>  $request->input('settingvalue'), 
            'type'          =>  $request->input('type')
        ]);
        return redirect('/adminpanel/sitesettings');

    }

    public function update(Request $request)
    {
        foreach(array_except($request->toArray(),'_token' ) as $settingName=> $settingValue)
        {
            if($settingName == 'main_slider')
            {
                if($request->hasFile($settingName))
                {
                    $fileNameWithExtension = $request->file($settingName)->getClientOriginalName();
                    $fileName              = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
                    $extension             = $request->file($settingName)->getClientOriginalExtension();
                    $fileNameToStore       = $fileName . '_' . time() . '.' . $extension;
                    
                    $path = $request->file($settingName)->storeAs('/public/storage/main_site_setting_image/',$fileNameToStore);
                }
                else
                {
                    $fileNameToStore = 'default.jpg';
                }
                DB::table('site_settings')
                ->where('settingname',$settingName)
                ->update(['settingvalue' => $fileNameToStore]);
            }else
            {
                DB::table('site_settings')
                ->where('settingname', $settingName)
                ->update(['settingvalue' => $settingValue]);   
            }
            
        }
        return redirect('/adminpanel/sitesettings');
    }
}






















/*
foreach(array_except($request->toArray(),['_token']) as $settingName => $settingValue)
        {
            $setting = $settings->where('settingname',$settingName)->get()[0];
            $setting->fill(['settingvalue' => $settingValue])->save();
        }
        return redirect('adminpanel/sitesettings');
        */