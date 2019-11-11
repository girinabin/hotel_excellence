<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Feedback;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackReply;
use Session;

class FeedbackController extends Controller
{
	//VIEW OF FEEDBACK
    public function index()
    {
    	$feedback  = DB::table('feedback')->get();
        return view('cd-admin.feedback.feedback',compact('feedback'));
    }
    public function reply()
    {
    	return view('cd-admin.feedback.reply');
    }

     public function viewreply()
    {
        $freply = DB::table('sent_messages')->where('through','feedback')->get();
        $qreply = DB::table('sent_messages')->where('through','quickmail')->get();
        $reply = DB::table('sent_messages')->get();
        return view('cd-admin.feedback.view_reply',compact('freply','qreply','reply'));
    }

    //END OF VIEW

//Create Feedback
    public function create()
    {
    	return view('cd-admin.feedback.add-feedback');
    }

    public function store(Feedback $f)
    {
        $f->add();
    	return redirect()->back();
	}

//redirect to Reply Form
	public function replyform($id)
	{
		$reply = Feedback::find($id);
		return view('cd-admin.feedback.reply',compact('reply'));
	}
//send message
    public function sendreply(Feedback $f)
    {
        $data = $f->sendvalidate();
        $f->sendreply($data);
        return redirect('/viewfeedback');

    }


    public function remove($id,Feedback $f)
    {
        $f->remove($id);
        return redirect('/viewfeedback');
    }

    public function replyremove($id)
    {
        DB::table('sent_messages')->where('id',$id)->delete();
        Session::flash('DeleteSuccess');
        return redirect('/viewfeedback/reply');
    }
    
    public function quick_mail(Feedback $f)
    {
        $data = $f->quickvalidate();
        $f->quick_mail($data);
        return redirect('/dashboard');
    }

}
