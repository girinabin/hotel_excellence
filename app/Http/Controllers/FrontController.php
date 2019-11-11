<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\About;
use App\Accomodation;
use App\Carousel;
use App\Facility;
use App\Gallery;
use App\Room;
use App\TailorPrograms;


class FrontController extends Controller
{

    public function home()
    {
        $carousel = Carousel::where('status','active')->get()->first();
        $carousels =Carousel::where('id','!=',$carousel['id'])->where('status','active')->get();
        $countcar = DB::table('carousels')->where('status','active')->count();
        $a = About::get()->first();
        $countabo = DB::table('abouts')->count();
        $rooms = Room::where('status','active')->get();
        $countroo = DB::table('rooms')->where('status','active')->count();
        $roomslug = DB::table('rooms')->where('status','active')->get()->first();
        return view('cd-admin.frontend.home.home',compact('carousel','carousels','a','rooms','countcar','roomslug')); 
    }

    public function about()
    {
    	$a = About::get()->first();
        $room = Room::where('status','active')->get();

        return view('cd-admin.frontend.about.about',compact('a','room'));
    }

    public function accomodation()
    {
    	$acc = Accomodation::where('status','active')->get()->first();
        $tailor = TailorPrograms::where('status','active')->get();
        return view('cd-admin.frontend.excellence.excellence',compact('acc','tailor'));
    }

    public function room($slug)
    {
    	$r = Room::where('room_slug',$slug)->where('status','active')->get()->first();
        dd($r);
    	return view('cd-admin.frontend.room.room',compact('r'));
    }

    public function facility()
    {
    	$fac = Facility::where('status','active')->get();
    	return view('cd-admin.frontend.gallery.album',compact('fac'));
    }

    public function gallery($slug)
    {
        $fa = Facility::where('slug',$slug)->get()->first();
        $gallery = Gallery::where('facility_id',$fa->id)->where('status','active')->get();
        return view('cd-admin.frontend.gallery.gallery',compact('fa','gallery'));
    }

    public function contact()
    {
        return view('cd-admin.frontend.contact.contact');
    }

    
}

