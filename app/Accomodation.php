<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\imagetrait;
use Carbon\Carbon;
use DB;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class Accomodation extends Model
{
	use imagetrait;
	protected $guarded = [];
	// protected $fillable = [

	// 	'accomodation_name',
	// 	'accomodation_image',
	// 	'image_alt',
	// 	'description',
	// 	'status',
	// ];

	protected $table = "accomodations";
	public function add($data)
	{
    	// dd($data);
		$a =[];
		// $a['accomodation_name'] = strip_tags($data['accomodation_name']);
		// $a['description'] = strip_tags($data['description']);
		// $a['image_alt'] = strip_tags($data['image_alt']);
		// $a['seo_title'] = strip_tags($data['seo_title']);
		// $a['seo_keyword'] = strip_tags($data['seo_keyword']);
		// $a['seo_description'] = strip_tags($data['seo_description']);
		$test = $this->addimage($data['accomodation_image']);
		$a['accomodation_image'] = $test;
		$a['created_at'] =Carbon::now('Asia/Kathmandu');
		$add = array_merge($data,$a);
		DB::table('accomodations')->insert($add);
		Session::flash('success');
	}

	public function edit($data,$id)
	{
		if(Input::hasfile('accomodation_image'))
		{
			$test =DB::table('accomodations')->where('id',$id)->get()->first();
			if(file_exists('public/uploads/room/'.$test->accomodation_image))
			{
				unlink('public/uploads/room/'.$test->accomodation_image);
			}

			$img =$this->addimage($data['accomodation_image']);

			$a['accomodation_image'] = $img;
			
			$a['updated_at'] = Carbon::now('Asia/Kathmandu');
			$new = array_merge($data,$a);
			// dd($new);
			$data = DB::table('accomodations')->where('id',$id)->update($new);
		}	
		else
		{
			$a['updated_at'] = Carbon::now('Asia/Kathmandu');
			$new = array_merge($data,$a);
			DB::table('accomodations')->where('id',$id)->update($new);
		}
		Session::flash('updatesuccess');
	}

	public function remove($id)
	{
		$test = DB::table('accomodations')->where('id',$id)->get()->first();
		if (file_exists('public/uploads/room/'.$test->accomodation_image)) 
		{
			unlink('public/uploads/room/'.$test->accomodation_image);
		}
		DB::table('accomodations')->where('id',$id)->delete();
        Session::flash('deletesuccess');
        
	}



	public function validateinsert()
	{
		$request = Request()->all();
		$data =  Request()->validate([
			'accomodation_name' => 'required',
			'summary' => 'required',
			'accomodation_image' => 'required|mimes:jpeg,jpg,svg,gif,png',
			'description' => 'required',
			'image_alt' => 'required',
			'status' => 'required',
			'seo_title' => 'required',
			'seo_description' => 'required',
			'seo_keyword' => 'required',

		]);
		return $data;
	}


	public function validateupdate()
	{
		$request = Request()->all();
		$data =  Request()->validate([
			'accomodation_name' => 'required',
			'summary' => 'required',
			'accomodation_image' => 'mimes:jpeg,jpg,svg,gif,png',
			'description' => 'required',
			'image_alt' => 'required',
			'status' => 'required',
			'seo_title' => 'required',
			'seo_description' => 'required',
			'seo_keyword' => 'required',

		]);
		return $data;
	}

	public function updatestatus($id)
	{
		$a = [];
        $test = DB::table('accomodations')->where('id',$id)->get()->first();
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
        DB::table('accomodations')->where('id',$id)->update($a);
	}
}