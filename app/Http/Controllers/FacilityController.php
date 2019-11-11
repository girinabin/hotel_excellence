<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facility;
use DB;
use Carbon\Carbon;

class FacilityController extends Controller
{
    public function index()
    {
        $fa = DB::table('facilities')->paginate(9);
        $count = DB::table('facilities')->count();
 		return view('cd-admin.facility.view-facility',compact('fa','count'));
    }

    public function create()
    {
    	return view('cd-admin.facility.add-facility');
    }

    public function view()
    {
    	return view('cd-admin.facility.view-gallery');
    }

    public function seo()
    {
    	return view('cd-admin.seo.facility-seo');
    }

    public function store(Facility $f)
    {
        
        $test = $f->validateinsert();
        $f->add($test);
        return redirect('/viewfacility');
    }

    public function remove(Facility $f,$id)
    {  
        
        $f->remove($id);
        return redirect('/viewfacility');
    }

    public function addgallery()
    {
        $data = DB::table('facilities')->get();
        $fac = 0;
        return view('cd-admin.facility.add-gallery',compact('data','fac'));
    }

    public function storegallery(Gallery $g)
    {
        $data = $g->validategallery();
        $g->add($data);

    }


    public function statusupdate($id,Facility $f)
    {   
        $f->statusupdate($id);
        return redirect('/viewfacility');
    }


}
