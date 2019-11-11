<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class DashboardController extends Controller
{
    public function index()
    {
    	$room = DB::table('rooms')->count();
    	$feedback = DB::table('feedback')->count();
    	$tailor = DB::table('tailor_programs')->count();
    	$accomodation = DB::table('accomodations')->count();
    	$recentmail = DB::table('sent_messages')->orderBy('id','desc')->take(8)->get();
    	return view('cd-admin.dashboard.dashboard',compact('room','feedback','tailor','accomodation','recentmail'));
    }

}
