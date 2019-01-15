<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Building;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class BuildingController extends Controller
{
    //
    
    public function index()
    {
        $buildings = Building::all();
        
        return view('admin.buildings.index',compact('buildings'));
    }

    public function create()
    {
        return view('admin.buildings.add');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required|min:5|max:191',
            'price'         => 'required',
            'rent'          => 'required',
            'rooms'         => 'required',
            'area'          => 'required|min:2',
            'type'          => 'required',
            'small_desc'    => 'required',
            'large_desc'    => 'required',
            'status'        => 'required',
            'langtude'      => 'required',
            'latitude'      => 'required',
            'approve'       => 'required',
            'meta'          => 'required',
            'image'         => 'image|mimes:jpg,jpeg,png|nullable|max:1999'
            ]);
        $building = new Building();
        $building->name         =   $request->input('name');
        $building->price        =   $request->input('price');
        $building->rent         =   $request->input('rent');
        $building->rooms        =   $request->input('rooms');
        $building->area         =   $request->input('area');
        $building->type         =   $request->input('type');
        $building->small_desc   =   $request->input('small_desc');
        $building->large_desc   =   $request->input('large_desc');
        $building->meta         =   $request->input('meta');
        $building->status       =   $request->input('status');
        $building->langtude     =   $request->input('langtude');
        $building->latitude     =   $request->input('latitude');
        $building->approve      =   $request->input('approve');
        $building->region       =   $request->input('region');
        
        $building->user_id      =   Auth::user()->id;

        if($request->hasFile('image'))
        {
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $fileName              = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension             = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore       = $fileName . '_' . time() . '.' . $extension;
            $path                  = $request->file('image')->storeAs('/public/storage/images_upload',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = "noimage.png";
        }
        $building->image        = $fileNameToStore;
        $building->save();
        return redirect('/adminpanel/buildings')->with('flash_message','تم اضافه العقار بنجاح');
    }

    public function edit($id)
    {
        $building = Building::find($id);
        return view('admin.buildings.edit',compact('building'));
    }

    public function update(Request $request,$id)
    {
        $building = Building::find($id);

        $this->validate($request,[
            'name'          => 'required|min:5|max:191',
            'price'         => 'required',
            'rent'          => 'required',
            'rooms'         => 'required',
            'area'          => 'required|min:2',
            'type'          => 'required',
            'small_desc'    => 'required',
            'large_desc'    => 'required',
            'status'        => 'required',
            'langtude'      => 'required',
            'latitude'      => 'required',
            'approve'       => 'required',
            'meta'          => 'required',
            'image'         => 'image|mimes:jpg,jpeg,png|nullable|max:1999'
        ]);
        if($request->hasFile('image'))
        {
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $fileName              = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension             = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore       = $fileName . '_' . time() . '.' . $extension;
            $path                  = $request->file('image')->storeAs('/public/storage/images_upload',$fileNameToStore);        
        }   

        $building->name         =   $request->input('name');
        $building->price        =   $request->input('price');
        $building->rent         =   $request->input('rent');
        $building->rooms        =   $request->input('rooms');
        $building->area         =   $request->input('area');
        $building->type         =   $request->input('type');
        $building->small_desc   =   $request->input('small_desc');
        $building->large_desc   =   $request->input('large_desc');
        $building->meta         =   $request->input('meta');
        $building->status       =   $request->input('status');
        $building->langtude     =   $request->input('langtude');
        $building->latitude     =   $request->input('latitude');
        $building->approve      =   $request->input('approve');
        $building->region       =   $request->input('region');
        $building->user_id      =   Auth::user()->id;
        if($request->hasFile('image'))
        {
            $building->image    = $fileNameToStore;
        }

        $building->save();
        return redirect('/adminpanel/buildings')->with('flash_message','تم تعديل العقار بنجاح');
    }
    public function destroy($id)
    {
        $building = Building::find($id);
        if($building->image != 'noimage')
        {
            Storage::delete('/public/images_upload/' . $building->image);
        }
        $building->delete();
        return redirect('/adminpanel/buildings')->with('flash_message','تم حذف العقار بنجاح');        
    }

    public function show($id)
    {
        $building = Building::find($id);
        $check = true;
        $sameType = Building::where('type',$building->type)->orderBy(DB::raw('RAND()'))->take(3)->get();
        $sameRent = Building::where('rent',$building->rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
        return view('website.single',compact('building','sameType','sameRent','check'));
    }

    public function getAllApprove()
    {
        $buildings = Building::orderBy('id','desc')->where('approve',1)->paginate(3);
        return view('website.buildings',compact('buildings'));
    }

    public function Rent($rent)
    {
        $rents = [0,1];
        if (! in_array($rent,$rents))
            return redirect('/all-buildings');

        $buildings = Building::where('approve',1)->where('rent',$rent)->orderBy('id','desc')->paginate(3);
        return view ('website.buildings',compact('buildings','rent'));
    }

    public function Type($type)
    {
        $types = [0,1,2,3,4];
        if (! in_array($type,$types))
            return redirect('/all-buildings');

        $buildings = Building::where('approve',1)->where('type',$type)->orderBy('id','desc')->paginate(3);
        return view('website.buildings',compact('buildings','type'));
    }
    public function search(Request $request)
    {
       $minPrice = 0;
       $maxPrice = 1000000000;       
       if($request->pricefrom != NULL)
       {
            $minPrice = $request->pricefrom ;
       }
       if($request->priceto != NULL)
       {
            $maxPrice = $request->priceto;
       }
       $items = array_except($request->toArray(),['_token','pricefrom','priceto','page']);
       $searchItems = array();
       $query = DB::table('buildings')->where('approve',1)->where('price','>=',$minPrice)->where('price','<=',$maxPrice);
       foreach($items as $key => $item)
       {
            if($item != '')
            {
                $query->where($key,$item);
                $searchItems[$key] = $item;   
            }    
       }
       $buildings = $query->paginate(3);
       
       $searchItems['pricefrom'] = $minPrice;
       $searchItems['priceto']   = $maxPrice;
       return view('website.buildings',compact('buildings','searchItems'));
    }

    public function UserCreate()
    {
        return view('website.user_roles.add');
    }
    public function UserStore(Request $request)
    {
     
        $this->validate($request,[
            'name'          => 'required|min:5|max:191',
            'price'         => 'required',
            'rent'          => 'required',
            'rooms'         => 'required',
            'area'          => 'required|min:2',
            'type'          => 'required',
            'large_desc'    => 'required',
            'status'        => 'required',
            'langtude'      => 'required',
            'latitude'      => 'required',
            'meta'          => 'required',
            'image'         => 'image|mimes:jpg,jpeg,png|nullable|max:1999'
            ]);
        $building = new Building();
        $building->name         =   $request->input('name');
        $building->price        =   $request->input('price');
        $building->rent         =   $request->input('rent');
        $building->rooms        =   $request->input('rooms');
        $building->area         =   $request->input('area');
        $building->type         =   $request->input('type');
        $building->small_desc   =   strip_tags(str_limit($request->input('large_desc'),160));
        $building->large_desc   =   $request->input('large_desc');
        $building->meta         =   $request->input('meta');
        $building->status       =   $request->input('status');
        $building->langtude     =   $request->input('langtude');
        $building->latitude     =   $request->input('latitude');
        $building->approve      =   0;
        $building->region       =   $request->input('region');
        
        $building->user_id      =   Auth::user() ? Auth::user()->id:0;

        if($request->hasFile('image'))
        {
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $fileName              = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension             = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore       = $fileName . '_' . time() . '.' . $extension;
            $path                  = $request->file('image')->storeAs('/public/storage/images_upload',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = "noimage.png";
        }
        $building->image        = $fileNameToStore;
        $building->save();
        return redirect('/adminpanel/buildings')->with('flash_message','تم اضافه العقار بنجاح');   
    }

    public function UserBuilds($id)
    {
        $buildings = Building::where('user_id',$id)->where('approve',1)->orderBy('id','desc')->paginate(3);
        return view('website.user_roles.user_buildings',compact('buildings'));
    }

    public function UserBuildsUnApprove($id)
    {
        $buildings = Building::where('user_id',$id)->where('approve',0)->orderBy('id','desc')->paginate(3);
        return view('website.user_roles.user_buildings',compact('buildings'));
    }

    public function UserEditBuilding($id)
    {
        $building = Building::find($id);
        
        if($building->user_id != Auth::user()->id)
        {
            return redirect('/user/' . Auth::user()->id . '/unappbuildings')->with('error_message','لا يمكنك التعديل على هذا العقار');
        }
        else
        {
            return view('website.user_roles.edit',compact('building'));
        }
    }
    
    public function UserUpdateBuilding(Request $request,$id)
    {
        
        $building = Building::find($id);
     
        $this->validate($request,[
            'name'          => 'required|min:5|max:191',
            'price'         => 'required',
            'rent'          => 'required',
            'rooms'         => 'required',
            'area'          => 'required|min:2',
            'type'          => 'required',
            
            'large_desc'    => 'required',
            'status'        => 'required',
            'langtude'      => 'required',
            'latitude'      => 'required',
            'approve'       => 'required',
            'meta'          => 'required',
            'image'         => 'image|mimes:jpg,jpeg,png|nullable|max:1999'
        ]);
        
        if($request->hasFile('image'))
        {
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $fileName              = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension             = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore       = $fileName . '_' . time() . '.' . $extension;
            $path                  = $request->file('image')->storeAs('/public/storage/images_upload',$fileNameToStore);        
        }   

        $building->name         =   $request->input('name');
        $building->price        =   $request->input('price');
        $building->rent         =   $request->input('rent');
        $building->rooms        =   $request->input('rooms');
        $building->area         =   $request->input('area');
        $building->type         =   $request->input('type');
        $building->large_desc   =   $request->input('large_desc');
        $building->meta         =   $request->input('meta');
        $building->status       =   $request->input('status');
        $building->langtude     =   $request->input('langtude');
        $building->latitude     =   $request->input('latitude');
        $building->approve      =   $request->input('approve');
        $building->region       =   $request->input('region');
        $building->user_id      =   Auth::user()->id;
        if($request->hasFile('image'))
        {
            $building->image    = $fileNameToStore;
        }
        
        $building->save();
        return redirect()->back()->with('flash_message','تم تعديل العقار بنجاح');        
    }

}
