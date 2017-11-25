<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Member;

class User extends Authenticatable
{
    use Notifiable;
	use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'username','date_of_birth','type','phone','created_by','verify','address', 'email', 'password','profile_image','dob','expiration_date','postalcode','total_members','total_price','membership_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function Members(){
	    return $this->hasMany('App\Member')->get();
//	    return $this->hasMany(Member::class);
    }

}
