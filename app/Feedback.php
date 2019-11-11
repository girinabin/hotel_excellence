<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mail\FeedbackReply;
use Carbon\Carbon;
use App\Feedback;
use DB;
use Illuminate\Support\Facades\Mail;
use Session;

class Feedback extends Model
{
    protected $guarded=[];

    protected $table = "feedback";

    public function add()
    {
    	    $data = Request()->validate([
    		'email' => 'required|email',
    		'message' => 'required|max:200',
    	]);
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $a['status'] = 'NotReplied';
        $merge =array_merge($data,$a);
    	Feedback::create($merge);
    }

    public function sendreply($data)
    {
    	$a=[];
        Mail::to($data['email'])->send(new FeedbackReply($data));
        $test['created_at'] = Carbon::now('Asia/Kathmandu');
        $merge = array_merge($data,$test);
        DB::table('sent_messages')->insert($merge);
        $a['status'] = 'Replied';
        DB::table('feedback')->where('id',$data['message_id'])->update($a);
        Session::flash('MailSuccess');
    }


    public function sendvalidate()
    {
        $data = Request()->validate([
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required|max:2048',
            'message_id' => 'required',
            'through' => 'required',
        ]);
        
        return $data;
    }

    public function quick_mail($data)
    {
        Mail::to($data['email'])->send(new FeedbackReply($data));
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $merge = array_merge($data,$a);
        DB::table('sent_messages')->insert($merge);
        Session::flash('SendSuccess');
    }

        public function quickvalidate()
    {
        $data = Request()->validate([
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required|max:2048',
            'through' => 'required',
        ]);
        return $data;
    }
    public function remove($id)
    {
    	$test = DB::table('feedback')->where('id',$id)->get();
        foreach($test as $t)
        {
            DB::table('sent_messages')->where('message_id',$t->id)->delete();
        }
        DB::table('feedback')->where('id',$id)->delete();
        Session::flash('DeleteSuccess');
    }
}
