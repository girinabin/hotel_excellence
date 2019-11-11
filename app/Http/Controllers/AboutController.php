<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\App\Traits;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Session;
use App\About;


class AboutController extends Controller
{
	public function index()
	{
		$about = DB::table('abouts')->get();
		return view('cd-admin.about.about',compact('about'));
	}

	public function seo()
	{
		return view('cd-admin.seo.about-seo');
	}

	public function create()
	{
		return view('cd-admin.about.add-about');
	}
	public function add(About $a)
	{ 
		$data = $a->insertvalidate();
		$a->add($data);
		return redirect('/viewabout');
	}


	public function update($id,About $a)
	{
		$data = $a->updatevalidate();
		$a->edit($data,$id);
		return redirect('/viewabout');
	}


}
