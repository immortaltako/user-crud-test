<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//class User extends Model
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    
    protected $table = "users";
    // Need to work on this, I normally avoid autonumber columns to setup primary key
    protected $primary_key = "id";

    
    # Quick sample of accessor + mutator
    // Please note to do the following we can use controller, this is just an example
    public function setPasswordAttribute($value) {
        return $this->attributes['password'] = md5($value);
    }

    public function setNameAttribute($value) {
        return $this->attributes['name'] = ucwords($value); // return keyword is optional
    }


    public function getGenderAttribute($value) {
        $userGender = $this->attributes['gender'];
        // will work on this later.


    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
