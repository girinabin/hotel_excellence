<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
    	$unreplied = DB::table('feedback')->where('status','NotReplied')->count();
    	$room = DB::table('rooms')->where('status','active')->get();
    	// dd($room);
    	View::share('unreplied',$unreplied);	
    	View::share('room',$room);
    }
}
