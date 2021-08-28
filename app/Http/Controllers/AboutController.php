<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;


class AboutController extends Controller
{

    public function About(){
        $abouts=About::get();
        return view('admin.about.index',compact('abouts'));
    }

    public function AddAbout(){
        return view('admin.about.add');

    }
    public function StoreAbout(Request $request){
        About::insert([
            'title' => $request->title,
            'short_dis'=>$request->short_dis,
            'long_dis'=>$request->long_dis,
            'created_at'=>Carbon::now()
        ]);
        return Redirect()->route('user.about')->with('success','About Insert Successfully');
    }

    public function Edit($id){
        $abouts=About::find($id);
        return view('admin.about.edit',compact('abouts'));

    }
    public function Update(Request $request, $id){
        About::find($id)->update([
            'title' => $request->title,
            'short_dis'=>$request->short_dis,
            'long_dis'=>$request->long_dis,
            'created_at'=>Carbon::now()
        ]);
        return Redirect()->route('user.about')->with('success','About Insert Successfully');
    }
    public function Delete($id){
        About::find($id)->delete();
        return Redirect()->route('user.about')->with('success','About Insert Successfully');

    }

    public function AboutUs(){
        $abouts=DB::table('abouts')->first();
        return view('admin.about.aboutUs',compact('abouts'));
    }

    public function Team(){
        return view('admin.about.team');
    }

    
}
