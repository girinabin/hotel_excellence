<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Input;
use Session;
use App\TailorPrograms;

class TailoredController extends Controller
{


	public function index()
	{
		$tailored = DB::table('tailor_programs')->get();
		return view('cd-admin.tailoredprograms.view-tailored-programs',compact('tailored'));
	}
    public function create()
    {
    	return view('cd-admin.tailoredprograms.add-tailored-programs');
    }

    public function add(TailorPrograms $t)
    {
        $test = $t->validateinsert();
        $t->add($test);
    	return redirect('/viewtailored');

    }

    public function update($id,TailorPrograms $t)
    {
    	$data = $t->validateupdate();
    	$t->edit($data,$id);
    	return redirect('/viewtailored');
    }



    public function updatestatus($id,TailorPrograms $t)
    {
        $t->updatestatus($id);
    	return redirect('/viewtailored');
    }

    public function remove($id,TailorPrograms $t)
    {
    	$t->remove($id);
    	return redirect('/viewtailored');
    }
}
