<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accomodation;
use DB;
use Session;
use Carbon\Carbon;

class AccomodationController extends Controller
{
    public function create()
    {
    	return view('cd-admin.accomodation.add-accomodation');
    }

    public function index()
    {
        $acc = DB::table('accomodations')->get();
        return view('cd-admin.accomodation.view-accomodation',compact('acc'));
    }

    public function seo()
    {
    	return view('cd-admin.seo.accomodation-seo');
    }




    public function store(Accomodation $a)
    {
        $test =$a->validateinsert();
        $a->add($test);
        return redirect('/viewaccomodation');
    }

    public function update(Accomodation $a,$id)
    {
        $test = $a->validateupdate();
        $a->edit($test,$id);
        return redirect('/viewaccomodation');
    }

    public function remove($id, Accomodation $a)
    {
        $a->remove($id);
        return redirect('/viewaccomodation');
    }   
    public function updatestatus($id,Accomodation $a)
    {   
        $a->updatestatus($id);
        return redirect('/viewaccomodation');
    }



}
