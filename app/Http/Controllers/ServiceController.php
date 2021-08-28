<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;


class ServiceController extends Controller
{
    public function ViewService(){

        $services=Service::get();
        return view('admin.service.index',compact('services'));

    }

    public function AddService(){
        return view('admin.service.add');

    }

    public function StoreService(Request $request){

        $service_image = $request->file('image');

       

        $name_gen=hexdec(uniqid()).'.'.$service_image->getClientOriginalExtension();
        Image::make($service_image)->resize(36,36)->save('image/service/'.$name_gen);
        $last_img='image/service/'.$name_gen;

        Service::insert([

            'title'=>$request->title,
            'desc'=>$request->desc,
            'image'=>$last_img,
            'created_at'=>Carbon::now()
        ]);
        return Redirect()->route('user.service')->with('success','Brand Insert Successfully');

    }

    public function Edit($id){
        $findServices=Service::find($id);
        return view('admin.service.edit',compact('findServices'));
    }

    public function Update(Request $request, $id){

        $old_image = $request->old_image;

        $service_image = $request->file('image');

        if($service_image){
            $name_gen=hexdec(uniqid()).'.'.$service_image->getClientOriginalExtension();
            Image::make($service_image)->resize(36,36)->save('image/service/'.$name_gen);
            $last_img='image/service/'.$name_gen;

        unlink($old_image);

        Service::find($id)->update([
            'title'=>$request->title,
            'desc'=>$request->desc,
            'image'=>$last_img,
            'created_at'=>Carbon::now()

        ]);
        return Redirect()->route('user.service')->with('success','Service Edit Successfully');

        }
        else{
            Service::find($id)->update([
                'title'=>$request->title,
                'desc'=>$request->desc,
                'created_at'=>Carbon::now()
            ]);
            return Redirect()->route('user.service')->with('success','Service Edit Successfully');

        }
    }

    public function Delete($id){
        $image=Service::find($id);
        $old_image=$image->image;
        unlink($old_image);
       
        Service::find($id)->delete();
        return Redirect()->route('user.service')->with('success','Service Delete Successfully');
    }



    public function ViewServiceHome(){

        $services=Service::get();
        return view('admin.service.serviceHome',compact('services'));
    }

   
}
