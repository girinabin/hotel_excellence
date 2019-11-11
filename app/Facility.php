<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use DB;
use Session;

class Facility extends Model
{
	protected $table = "facilities";
    protected $guarded = [];

    public function add($data)
    {
    	$a =[];
    	if(Input::hasfile('facility_image'))
    	{
    		$file = $data['facility_image'];
    		$filename =time().$file->getClientOriginalName();
    		$destination = public_path('uploads/facility');
    		$file->move($destination,$filename);
    		$a['facility_image'] = $filename;
    	}
    	$a['created_at'] = Carbon::now('Asia/Kathmandu');
        $a['slug'] = str_slug($data['facility_name']);
    	$merge = array_merge($data,$a);
    	//dd($merge);
    	DB::table('facilities')->insert($merge);
    	Session::flash('success');
 }

	public function remove($id)
	{
		$test = DB::table('facilities')->where('id',$id)->get()->first();
        
		if(file_exists('public/uploads/facility/'.$test->facility_image))
		{
			unlink('public/uploads/facility/'.$test->facility_image);
		}
        $gallery =DB::table('galleries')->where('facility_id',$id)->get();
        foreach($gallery as $gallerys)
        {
            if(file_exists('public/uploads/gallery/'.$gallerys->image_name))
            {
                unlink('public/uploads/gallery/'.$gallerys->image_name);
            DB::table('galleries')->where('id',$gallerys->id)->delete();
            }
        }
		DB::table('facilities')->where('id',$id)->delete();
		Session::flash('deletesuccess');
	}

    public function validateinsert()
    {
        $data = Request()->validate([
            'facility_name' => 'required',
            'facility_image' => 'required|mimes:jpeg,jpg,svg,png,gif',
            'image_alt'  => 'required',
            'seo_description' => 'required',
            'seo_title' => 'required',
            'seo_keyword' =>'required',
            'status' => 'required',
        ]);
         return $data;
    }

    public function statusupdate($id)
    {
    	$a = [];
        $test = DB::table('facilities')->where('id',$id)->get()->first();
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
        DB::table('facilities')->where('id',$id)->update($a);
    }
}
