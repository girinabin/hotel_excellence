<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use Carbon\Carbon;
class TailorPrograms extends Model
{
	protected $guarded = [];

	protected $table = "tailor_programs";

	public function add($data)
	{
		$a['created_at'] = Carbon::now('Asia/Kathmandu');
		if(Input::hasfile('t_image'))
		{
			$file = $data['t_image'];
			$filename = time().$file->getClientOriginalName();
			$destination = public_path('uploads/tailoredprograms');
			$file->move($destination,$filename);
			$a['t_image'] = $filename;
		}
		$merge = array_merge($data,$a);
		DB::table('tailor_programs')->insert($merge);
		Session::flash('Success');

	}

	public function validateinsert()
	{
		$data = Request()->validate([
			'name' => 'required',
			't_image' => 'required|mimes:jpeg,svg,png,jpg,gif',
			'alt_image' => 'required',
			'summary' => 'required',
			'status' => 'required',
		]);
		return $data;
	}

	public function edit($data,$id)
	{
		$test = DB::table('tailor_programs')->where('id',$id)->get()->first();
		if(Input::hasfile('t_image'))
		{
			if(file_exists('public/uploads/tailoredprograms/'.$test->t_image))
			{
				unlink('public/uploads/tailoredprograms/'.$test->t_image);
			}
			$file = $data['t_image'];
			$filename = time().$file->getClientOriginalName();
			$destination = public_path('uploads/tailoredprograms');
			$file->move($destination,$filename);
			$a['t_image'] = $filename;
		}
		$a['updated_at'] = Carbon::now('Asia/Kathmandu');
		$merge = array_merge($data,$a);
		DB::table('tailor_programs')->where('id',$id)->update($merge);
		Session::flash('UpdateSuccess');
	}

	public function validateupdate()
	{
		$data = Request()->validate([
			'name' => 'required',
			't_image' => 'mimes:jpeg,svg,png,jpg,gif',
			'alt_image' => 'required',
			'summary' => 'required',
			'status' => 'required',
		]);
		return $data;
	}

	public function updatestatus($id)
	{
		$test = DB::table('tailor_programs')->where('id',$id)->get()->first();
    	if ($test->status == 'active') 
    	{
    		$a['status'] ='inactive';	
    	}
    	else
    	{
    		$a['status'] = 'active';
    	}
    	DB::table('tailor_programs')->where('id',$id)->update($a);
	}

	public function remove($id)
	{
		DB::table('tailor_programs')->where('id',$id)->delete();
    	Session::flash('DeleteSuccess');
	}

}
