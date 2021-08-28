<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;


class HomeController extends Controller
{

    public function __construct(){
        $this->Middleware('auth');
    }


    public function Logout(){
        Auth::logout();

        return Redirect()->route('login')->with('success','Logout Successfully');

    }
    public function Slider(){
        $sliders=Slider::get();
        return view('admin.slider.sliderDash',compact('sliders'));

    }
    public function AddSlider(){
        return view('admin.slider.addSlider');
    }

    public function StoreSlider(Request $request){

        $slider_image = $request->file('image');

       

        $name_gen=hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        $last_img='image/slider/'.$name_gen;

        Slider::insert([

            'title'=>$request->title,
            'discription'=>$request->discription,
            'image'=>$last_img,
            'created_at'=>Carbon::now()
        ]);
        return Redirect()->route('user.slider')->with('success','Brand Insert Successfully');


    }

    public function Edit($id){
        $sliders=Slider::find($id);
        return view('admin.slider.editSlider',compact('sliders'));
    }

    public function Update(Request $request, $id){

        $old_image = $request->old_image;

        $slider_image = $request->file('image');

        if($slider_image){
        $img_gen=hexdec(uniqid());
        $name_ext= strtolower($slider_image->getClientOriginalExtension());
        $img_name=$img_gen.'.'.$name_ext;
        $up_location='image/slider/';
        $last_img=$up_location.$img_name;
        $slider_image->move($up_location,$img_name);

        unlink($old_image);

        Slider::find($id)->update([

            'title'=>$request->title,
            'discription'=>$request->discription,
            'image'=>$last_img,
            'created_at'=>Carbon::now()
        ]);
        return Redirect()->route('user.slider')->with('success','Slider Edit Successfully');



        }
        else{
            Slider::find($id)->update([

                'title'=>$request->title,
                'discription'=>$request->discription,
                'created_at'=>Carbon::now()
    
            ]);
            return Redirect()->route('user.slider')->with('success','Slider Edit Successfully');

        }

    }
    public function Delete($id){

        $image=Slider::find($id);
        $old_image=$image->image;
        unlink($old_image);
       


        $delete=Slider::find($id)->forceDelete();
        return Redirect()->route('user.slider')->with('success','Slider Delete Successfully');
    }
    
}
