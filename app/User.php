<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\VerifyEmail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','lname' , 'email','password','phone', 'address', 'type_id','profileimage' , 'coverimage' , 'token' , 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function verified()
    {
        return $this->token === null;
    }

    public function sendVerifiedEmail()
    {
        $this->notify(new VerifyEmail($this));
    }
}
