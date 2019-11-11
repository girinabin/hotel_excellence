<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
use App\Carousel;

class Carousel extends Model
{
    protected $guarded=[];

    protected $table = "carousels";


    public function add()
    {
    	$a = [];
    	$data = Request()->validate([
    		'name' => 'required',
    		'c_image' => 'required|mimes:jpeg,svg,png,gif,jpg',
    		'alt_image' => 'required',
    		'status' => 'required',

    	]);
    	$a['created_at'] = Carbon::now('Asia/Kathmandu');
    	if(Input::hasfile('c_image'))
    	{
    		$file = $data['c_image'];
    		$filename = time().$file->getClientOriginalName();
    		$destination = public_path('uploads/carousel');
    		$file->move($destination,$filename);
    		$a['c_image'] = $filename;
    	}
    	$merge = array_merge($data,$a);
    	DB::table('carousels')->insert($merge);
    	Session::flash('Success');
    }

    public function updatestatus($id)
    {
    	$test = DB::table('carousels')->where('id',$id)->get()->first();
    	if($test->status == 'active')
    	{
    		$a['status'] = 'inactive';
    	}
    	else
    	{
    		$a['status'] = 'active';
    	}
    	DB::table('carousels')->where('id',$id)->update($a);
    }

    public function remove($id)
    {
    	
    	$test = DB::table('carousels')->where('id',$id)->get()->first();
    	if(file_exists('public/uploads/carousel/'.$test->c_image))
    	{
    		unlink('public/uploads/carousel/'.$test->c_image);
    	}
    	DB::table('carousels')->where('id',$id)->delete();
    	Session::flash('DeleteSuccess');
    }
}
