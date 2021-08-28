<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\MultiPicture;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;

class MultiImageController extends Controller
{
    public function __construct(){
        $this->Middleware('auth');
    }

    public function allImage(){
        $images=DB::table('multi_pictures')->get();
        return view('admin.mpicture.allPicture',compact('images'));
    }

    public function addImage(Request $request){

        

        $multi_image= $request->file('image');

        

            $name_gen=hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
            Image::make($multi_image)->resize(300,200)->save('image/multi/'.$name_gen);
            $last_img='image/multi/'.$name_gen;
    
            MultiPicture::insert([
    
                'type'=>$request->type,
                'image'=>$last_img,
                'created_at'=>Carbon::now()
    
            ]);
           
    
      
        return Redirect()->back()->with('success','Brand Insert Successfully');


    }
    public function portfolio(){
        $apps = DB::table('multi_pictures')->where('type', 'app')->get();
        $webs = DB::table('multi_pictures')->where('type', 'web')->get();
        $cards = DB::table('multi_pictures')->where('type', 'card')->get();
    
    
        return view('admin.mpicture.portfolio',compact('apps','webs','cards'));
    }

    public function Delete($id){
        $image=MultiPicture::find($id);
        $old_image=$image->image;
        unlink($old_image);
       
        
        MultiPicture::find($id)->delete();
        return redirect()->route('multi.image')->with('success','Image Delete Successfully');

    }
}
