<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Building;
use App\User;
use App\Contact;


class AdminController extends Controller
{
    //
    public function index()
    {
        $users              = User::all()->count();
        $building_unapp     = Building::where('approve',0)->count();
        $building_app       = Building::where('approve',1)->count();
        $messages           = Contact::all()->count();
        $latestUsers        = User::orderBy('id','DESC')->take(8)->get();
        $latestMsgs         = Contact::orderBy('id','DESC')->take(8)->get();
        $latestBuildings    = Building::orderBy('id','DESC')->take(3)->get();   


        return view('admin.home.index',compact('users','building_unapp','building_app',
        'messages','latestUsers','latestMsgs','latestBuildings'));
    }
}
