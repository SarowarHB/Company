<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactMessage;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;

class ContactController extends Controller
{
    public function __construct(){
        $this->Middleware('auth');
    }

   public function Contact(){

    $contacts=Contact::get();
       return view('admin.contact.index',compact('contacts'));
   }
   public function AddContact(){
       return view('admin.contact.add');
   }

   public function StoreContact(Request $request){
    Contact::insert([

        'address'=>$request->address,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'created_at'=>Carbon::now()
    ]);
    return redirect()->route('contact.profile')->with('success','Contact Insert Successfully');
   }

   public function Edit($id){
       $contacts = Contact::find($id);
       return view('admin.contact.edit',compact('contacts'));
   }
   public function Update(Request $request, $id){
    Contact::find($id)->update([

        'address'=>$request->address,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'created_at'=>Carbon::now()
    ]);
    return redirect()->route('contact.profile')->with('success','Contact Update Successfully');

   }

   public function Delete($id){
       Contact::find($id)->delete();
       return redirect()->route('contact.profile')->with('success','Contact Delete Successfully');
       
   }

   public function ContactHome(){

    $datas=DB::table('contacts')->first();
       return view('admin.contact.contactHome', compact('datas'));
   }

   


   public function SendData(Request $request){
    ContactMessage::insert([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
        'created_at'=>Carbon::now()
        
    ]);
    return redirect()->route('contact')->with('success','Message send Successfully');

   }

   public function Message(){
       $msgs=ContactMessage::get();
       return view('admin.contact.contactMsg',compact('msgs'));
   }
   public function DeleteMessage($id){
    ContactMessage::find($id)->delete();
    
    return redirect()->route('contact.message')->with('success','Message Delete Successfully');

   }
   public function Pricing(){
       return view('admin.accounts.pricing');
   }
   public function Blog(){
    return view('admin.blog.blog');
}

public function Testimonal(){

    return view('admin.blog.testimonal');
}

}
