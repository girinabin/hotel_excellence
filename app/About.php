<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\App\Traits;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Session;
use App\About;
class About extends Model
{
    protected $guarded = [];
    protected $table = "abouts";

    public function add($data)
    {
    	$a = [];
		if(Input::hasfile('image_name'))
		{
			$file = $data['image_name'];
			$filename = time().$file->getClientOriginalName();
			$destination = public_path('uploads/about');
			$file->move($destination,$filename);
			$a['image_name'] = $filename;
		}
		$merge = array_merge($data,$a);
		DB::table('abouts')->insert($merge);
		Session::flash('success');
    }

	public function insertvalidate()
	{

		$data = Request()->validate([
			'about_name' => 'required',
			'summary' => 'required',
			'description' => 'required',
			'image_name' => 'required|mimes:svg,png,jpg,jpeg,gif',
			'image_alt' => 'required',
			'seo_title' => 'required',
			'seo_description' => 'required',
			'seo_keyword' => 'required',

		]);

		return $data;
	}

	public function edit($data,$id)
	{
	$a = [];

	
		if(Input::hasFile('image_name'))
		{
			$test = DB::table('abouts')->where('id',$id)->get()->first();
			if (file_exists('public/uploads/about/'.$test->image_name)) 
			{
				unlink('public/uploads/about/'.$test->image_name);
			}

			$file = $data['image_name'];
			$filename = time().$file->getClientOriginalName();
			$destination = public_path('uploads/about');
			$file->move($destination,$filename);
			$a['image_name'] = $filename ;
			$a['updated_at'] =Carbon::now();
			
			$replace = array_merge($data,$a);
			$data = DB::table('abouts')->where('id',$id)->update($replace);
		}
		else
		{
			
			$a['updated_at'] =Carbon::now();
			
			$replace = array_merge($data,$a);
			DB::table('abouts')->where('id',$id)->update($replace);

		}
		Session::flash('updatesuccess');	
	}


	public function updatevalidate()
	{

		
		$data = Request()->validate([
			'about_name' => 'required',
			'summary' => 'required',
			'description' => 'required',
			'image_name' => 'mimes:jpg,jpeg,png,gif,svg',
			'image_alt' => 'required',
			'seo_title' => 'required',
			'seo_description' => 'required',
			'seo_keyword' => 'required',

		]);
		return $data;
	}
}
