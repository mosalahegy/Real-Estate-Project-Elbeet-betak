<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;
use App\Building;
use Datatables;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }
   
/*
    public function index()
    {
        return view('admin.users.index');
    }
 */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'      =>  'required|min:2|max:50',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required|same:password_confirmation'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->admin = 0;
        $user->save();
        return redirect('adminpanel/users/create')->with('success','تم اضافة العضو بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $buildings = Building::where('user_id',$id)->paginate(5);
        $user = User::find($id);
        return view('admin.users.user_data',compact('buildings','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'      =>  'required|min:2|max:50',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required|same:password_confirmation'
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect('adminpanel/users/create')->with('flash_message','تم تعديل العضو بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect('/adminpanel/users')->with('flash_message','تم حذف العضو بنجاح');;
    }

    public function anyData()
    {
        $users = User::all();
        return Datatables::of($users)->editColumn('name',function($model){

            return url('/adminpanel/users/' . $model->id . '/edit' . $model->name);

        })->editColumn('admin',function($model){

            return $model->admin == 0 ? "<span class='badge badge-info'>عضو</span>" : "<span class='badge badge-success'>مدير الموقع</span>";

        })->editColumn('control',function($model){

            $all =  "<a href='/adminpanel/users/" . $model->id . "/edit' class='btn btn-primary'>تعديل</a>";
            $all .=  "<a href='/adminpanel/users/" . $model->id . "/delete' class='btn btn-danger'>حذف</a>";

            return $all;

        })->make(true);
    }

    public function editProfile($id)
    {
        $user = User::find($id);
        return view('website.profile.edit',compact('user'));
    }

    public function updateProfile(Request $request,$id)
    {
        $user = User::find($id);
        $this->validate($request,[
            'name'      =>  'required|min:2|max:50',
            'email'     =>  [
                'required',
                Rule::unique('users')->ignore($user->id),   // To ignore the user email before update
                'email'
            ],
            'password'  =>  'same:password_confirmation'
        ]);
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');   
        $user->password = $request->input('password') == '' ? $user->password : bcrypt($request->input('password'));
        $user->save();
        Auth::login($user);
        return view('website.profile.edit')->with('flash_message','تم تعديل البيانات بنجاح')->with('user',$user);
    }
}
