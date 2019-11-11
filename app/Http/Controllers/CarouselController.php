<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
use App\Carousel;

class CarouselController extends Controller
{
    public function create()
    {
    	return view('cd-admin.carousel.add-carousel');
    }

    public function view()
    {
    	$carousel = DB::table('carousels')->get();
    	return view('cd-admin.carousel.view-carousel',compact('carousel'));
    }
    public function add(Carousel $c)
    {
        $c->add();    	
    	return redirect('/viewcarousel');
    }
    public function updatestatus($id,Carousel $c)
    {
        $c->updatestatus($id);
    	return redirect('/viewcarousel');
    }
    public function remove($id,Carousel $c)
    {
        $c->remove($id);
    	return redirect('/viewcarousel');
    }

}
