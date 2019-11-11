<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Traits\imagetrait;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use Carbon\Carbon;

class Room extends Model
{
	use imagetrait;
	protected $table = "rooms";
  protected $guarded=[];

  public function add($data)
  {


   $a =[];
   //$a = $this->prevent($data);
   $test = $this->addimage($data['cover_image']);
   $a['cover_image'] = $test;
   $a['created_at'] = Carbon::now();
   $a['room_slug'] = str_slug($data['room_title']);
   $replace = array_merge($data,$a);
   DB::table('rooms')->insert($replace);
   Session::flash('success');

 }

 public function edit($data,$id)
 {

  if(Input::hasFile('cover_image'))
  {
   $test = DB::table('rooms')->where('id',$id)->get()->first();
   if (file_exists('public/uploads/room/'.$test->cover_image)) 
   {
     unlink('public/uploads/room/'.$test->cover_image);
   }

   $test = $this->addimage($data['cover_image']);
   $a['cover_image'] = $test ;
   $a['updated_at'] =Carbon::now();
   $a['room_slug'] = str_slug($data['room_title']);

   $replace = array_replace($data,$a);
   $data = DB::table('rooms')->where('id',$id)->update($replace);
 }
 else
 {
   $a['updated_at'] =Carbon::now();
   $a['room_slug'] = str_slug($data['room_title']);

   $replace = array_replace($data,$a);
   DB::table('rooms')->where('id',$id)->update($replace);

 }
 Session::flash('updatesuccess');
}


public function remove($id)
{
  $test = DB::table('rooms')->where('id',$id)->get()->first();
  if (file_exists('public/uploads/room/'.$test->cover_image)) 
  {
    unlink('public/uploads/room/'.$test->cover_image);

  }
  DB::table('rooms')->where('id',$id)->delete();
  Session::flash('deletesuccess');
}

public function validateinsert()
{
  $request =Request()->all();
  //dd($request);

  $data =  Request()->validate([
    'room_title' => 'required',
    'summary' => 'required',
    'description' => 'required',
    'cover_image' => 'required|mimes:jpg,jpeg,png,svg,webm,gif',
    'alt_cover' => 'required',
    'seo_title' => 'required',
    'seo_description' => 'required',
    'seo_keyword' => 'required',
    'status' => 'required',
  ]);
  return $data;
}


public function validateupdate()
{

  $data =  Request()->validate([
    'room_title' => 'required',
    'summary' => 'required',
    'description' => 'required',
    'alt_cover' => 'required',
    'seo_title' => 'required',
    'seo_description' => 'required',
    'seo_keyword' => 'required',
    'status' => 'required',
    'cover_image' => 'mimes:jpg,jpeg,png,svg,gif',

  ]);
  return $data;
}

public function updatestatus($id)
{
  $a = [];
  $test = DB::table('rooms')->where('id',$id)->get()->first();
  if($test->status=='active')
  {
    $a['status'] = 'inactive';
  }
  else
  {
    $a['status'] = 'active'; 
  }
  $a['updated_at'] =Carbon::now('Asia/Kathmandu');
  DB::table('rooms')->where('id',$id)->update($a);
}
public function prevent($data)
{
  $a=[];
  $a['room_title'] = e($data['room_title']);
  $a['summary'] = e($data['summary']);
  $a['description'] = e($data['description']);
  $a['alt_cover'] = e($data['alt_cover']);
  $a['status'] = e($data['description']);
  $a['seo_title'] = e($data['description']);
  $a['seo_keyword'] = e($data['description']);
  $a['seo_description'] = e($data['description']);

  return $a;
}
}
