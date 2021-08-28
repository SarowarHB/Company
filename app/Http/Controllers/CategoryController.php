<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{


   public function __construct(){
      $this->Middleware('auth');
  }


    public function allCat(){

        //Eloquent ORM Read
        $categories=Category::paginate(5);
        $trachCat= Category::onlyTrashed()->latest()->paginate(3);

       //Query Builders
       //$categories=DB::table('categories')->paginate(4);
       //join Ones on
      // $categories=DB::table('categories')->join('users','categories.user_id','users.id')->select('categories.*','users.name')->paginate(4);


        return view('admin.category.allView',compact('categories','trachCat'));
    }



    public function addCat(request $request){

        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            
        ]);

        Category::insert([

            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
            'created_at'=>Carbon::now()

        ]);
    

     return Redirect()->back()->with('success','Category Insert Successfully');
    }

     public function Edit($id){

        $categories=Category::find($id);
        return view('admin.category.edit',compact('categories'));


     }
     public function Update(Request $request,$id){

        $update=Category::find($id)->update([
        'category_name'=>$request->category_name,
        'user_id'=>Auth::user()->id
    
    ]);
    return Redirect()->route('all.category')->with('success','Category Insert Successfully');


     }

     public function softDelete($id){

        $delete=Category::find($id)->delete();
        return Redirect()->back()->with('success','Delete Sucessfully');


     }
     public function Restore($id) {

        $delete=Category::withTrashed()-> find($id)->restore();
        return Redirect()->back()->with('success','Category Restore Successfully');
     }

     public function pDelete($id){

        $delete=Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Permanently Delete Successfully');
     }

    
}
