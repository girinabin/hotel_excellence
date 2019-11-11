<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Facility;
use Session;    
use DB;
use Carbon\Carbon;

class GalleryController extends Controller
{

    public function index($id)
    {
        $gallery = DB::table('galleries')->where('facility_id',$id)->get();
        $facility = DB::table('facilities')->where('id',$id)->get()->first();
        $fa_id = $id;
        return view('cd-admin.facility.view-gallery',compact('gallery','facility','fa_id'));
    }

    public  function store(Gallery $g)
    {
    	$data = $g->validateinsert();
    	$g->add($data);
        Session::flash('Success');
    	return redirect('/viewgallery/'.$data['facility_id']);
    }

  public function statusupdate($id,Gallery $g)
  {   
    $g->statusupdate($id);
    return redirect()->back();
    }
public function addgallery($id)
{
        $data = DB::table('facilities')->get();
        $fac = DB::table('facilities')->where('id',$id)->get()->first();
        return view('cd-admin.facility.add-gallery',compact('data','fac'));
}

public function remove($id,Gallery $g)
{
    $test = DB::table('galleries')->where('id',$id)->get()->first();
    $g->remove($id);
    return redirect('/viewgallery/'.$test->facility_id);

}
}
