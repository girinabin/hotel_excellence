<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Traits\imagetrait;
use DB;
use carbon\Carbon;
class RoomController extends Controller
{

  use imagetrait;
  public function create()
  {
    return view('cd-admin.room.create');
  }

  public function index()
  {
    $room = Room::all();
    return view('cd-admin.room.index',compact('room'));
  }

  public function seo()
  {
    return view('cd-admin.seo.room-seo');
  }

  public function store(Room $r)
  {
    $test = $r->validateinsert();
    $r->add($test);
    return redirect('/viewroom');
  }


  public function update($id,Room $r)
  {

    $data = $r->validateupdate();
    $r->edit($data,$id);
    return redirect('/viewroom');

  }

  public function delete($id,Room $r)
  {
    $r->remove($id);
    return redirect('/viewroom');
  }
  public function statusupdate($id,Room $r)
  {
    $r->updatestatus($id);
    return redirect('/viewroom');
  }

}
