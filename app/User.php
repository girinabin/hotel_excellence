<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = "users";

    public function add()
    {
        if($data['password'] == $data['confirm_password'])
        {
            $a['password'] = bcrypt($data['password']);
        }
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $a['name'] = $data['name'];
        $a['email'] = $data['email'];
        DB::table('users')->insert($a);
        Session::flash('Suceess');
    }

    public function uservalidate()
    {
        $data = Request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);
        return $data;
    }

}
