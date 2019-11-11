<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Session;
use App\User;

class AdminController extends Controller
{
    public function view()
    {
    	$admin = DB::table('users')->paginate(15);
    	return view('cd-admin.admin.view-admin',compact('admin'));
    }
    public function create()
    {
    	return view('cd-admin.admin.add-admin');
    }

    public function add(User $u)
    {
        $data = $u->uservalidate();
        $u->add($data);
        return redirect('/viewadmin');


    }


}
