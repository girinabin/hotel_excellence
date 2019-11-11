<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gallery;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Input;
use Session;
class Gallery extends Model
{

	protected $table = "galleries";
	protected $guarded = [];


	public function add($data)
	{
		
		$a =[];
		if(Input::hasfile('image_name'))
		{
			$file = $data['image_name'];
			$filename = time().$file->getClientOriginalName();
			$destination = public_path('uploads/gallery');
			$file->move($destination,$filename);
			$a['image_name'] = $filename;
		}
		$a['created_at'] = Carbon::now('Asia/Kathmandu');
		$b = array_replace($data,$a);
		// dd($b);
		DB::table('galleries')->insert($b);
	}

	public function validateinsert()
	{
		$data = Request()->validate([
			'facility_id' => 'required',
			'image_name' => 'required|mimes:jpg,jpeg,png,svg,webm,gif',
			'image_alt' => 'required',
			'status' => 'required',
		]);
		return $data;
	}
	
	public function statusupdate($id)
	{
		$a = [];
		$test = DB::table('galleries')->where('id',$id)->get()->first();
        // $a = ($test->status == 'active') ? 'inactive' : 'active' ;
		if($test->status=='active')
		{
			$a['status'] = 'inactive';
		}
		else
		{
			$a['status'] = 'active'; 
		}
		$a['updated_at'] =Carbon::now('Asia/Kathmandu');
		DB::table('galleries')->where('id',$id)->update($a);
	}



	public function remove($id)
	{
		$test = DB::table('galleries')->where('id',$id)->get()->first();
		if(file_exists('public/uploads/gallery/'.$test->image_name))
		{
			unlink('public/uploads/gallery/'.$test->image_name);
		}
		DB::table('galleries')->where('id',$id)->delete();
		Session::flash('DeleteSuccess');

	}

	public function validategallery()
	{
		$data = Request()->validate([
			'gallery_id' => 'required',
			'image_name' => 'required',
			'status' => 'required',
		]);
		return $data;

	}
}
