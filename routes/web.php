<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MultiImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ChangePassword;


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');



Route::get('/', function () {
    $brands=DB::table('brands')->get();
    $abouts=DB::table('abouts')->first();
    //$pictures=DB::table('multi_pictures')->get();
    $apps = DB::table('multi_pictures')->where('type', 'app')->get();
    $webs = DB::table('multi_pictures')->where('type', 'web')->get();
    $cards = DB::table('multi_pictures')->where('type', 'card')->get();


    $services=DB::table('services')->get();

    return view('home',compact('brands','abouts','apps','webs','cards','services'));
})->name('/');

Route::get('/home', function () {
    echo 'Welcome Home';
})->middleware('age');



//Category
Route::get('/catagoryAll', [CategoryController::class, 'allCat'])->name('all.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
Route::get('/softDelete/category/{id}', [CategoryController::class, 'softDelete']);
Route::get('/restore/category/{id}', [CategoryController::class, 'Restore']);
Route::get('/delete/category/{id}', [CategoryController::class, 'pDelete']);
Route::post('/catagoryPost', [CategoryController::class, 'addCat'])->name('store.category');

//Brand
Route::get('/brand/all', [BrandController::class, 'allBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'addBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);


//Multi Image Controller
Route::get('/multi/all', [MultiImageController::class, 'allImage'])->name('multi.image');
Route::post('/image/add', [MultiImageController::class, 'addImage'])->name('store.image');
Route::get('/image/delete/{id}', [MultiImageController::class, 'Delete']);

//portfolio part controllers
Route::get('/portfolio',[MultiImageController::class, 'portfolio'])->name('portfolio');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
   // $users=User::all();
   //$users=DB::table('users')->get();

    return view('admin.index');
})->name('dashboard');


//Deshboard Controller Slider
Route::get('/logout/user',[HomeController::class, 'Logout'])->name('user.logout');
Route::get('/slider',[HomeController::class, 'Slider'])->name('user.slider');
Route::get('/slider/add',[HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/slider/store',[HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [HomeController::class, 'Edit']);
Route::post('/slider/update/{id}', [HomeController::class, 'Update']);
Route::get('/slider/delete/{id}', [HomeController::class, 'Delete']);

//Deshboard Controller About
Route::get('/about',[AboutController::class, 'About'])->name('user.about');
Route::get('/about/add',[AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/about/store',[AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'Edit']);
Route::post('/about/update/{id}', [AboutController::class, 'Update']);
Route::get('/about/delete/{id}', [AboutController::class, 'Delete']);
Route::get('/aboutUs',[AboutController::class, 'AboutUs'])->name('aboutus');
Route::get('/home/team',[AboutController::class, 'Team'])->name('team');


//Service Controllers
Route::get('/service',[ServiceController::class, 'ViewService'])->name('user.service');
Route::get('/service/add',[ServiceController::class, 'AddService'])->name('add.service');
Route::post('/service/store',[ServiceController::class, 'StoreService'])->name('store.service');
Route::get('/service/edit/{id}',[ServiceController::class, 'Edit']);
Route::post('/service/update/{id}', [ServiceController::class, 'Update']);
Route::get('/service/delete/{id}', [ServiceController::class, 'Delete']);
Route::get('/home/service',[ServiceController::class, 'ViewServiceHome'])->name('service');

//Admin contacts controller
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact.profile');
Route::get('/contact/add',[ContactController::class, 'AddContact'])->name('add.contact');
Route::post('/contact/store',[ContactController::class, 'StoreContact'])->name('store.contact');
Route::get('/contact/edit/{id}', [ContactController::class, 'Edit']);
Route::post('/contact/update/{id}', [ContactController::class, 'Update']);
Route::get('/contact/delete/{id}', [ContactController::class, 'Delete']);
//Message
Route::get('/message', [ContactController::class, 'Message'])->name('contact.message');
Route::get('/message/delete/{id}', [ContactController::class, 'DeleteMessage']);

//Home contacts controller
Route::get('/home/contact', [ContactController::class, 'ContactHome'])->name('contact');
Route::post('/contact/sendData',[ContactController::class, 'SendData'])->name('contact.sendData');

Route::get('/home/pricing', [ContactController::class, 'Pricing'])->name('pricing');
Route::get('/home/blog', [ContactController::class, 'Blog'])->name('blog');
Route::get('/home/testimonal', [ContactController::class, 'Testimonal'])->name('testimonal');

//Change password
Route::get('/user/password', [ChangePassword::class, 'ChangePassword'])->name('change.password'); 
Route::post('/user/password/update', [ChangePassword::class, 'UpdatePassword'])->name('update.password');

