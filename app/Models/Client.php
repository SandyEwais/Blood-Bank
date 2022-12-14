<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable 
{
    use Searchable;
    public $columns = ['phone', 'password', 'pin_code', 'name', 'email', 'd_o_b', 'last_donation_date', 'blood_type_id', 'city_id'];
    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('phone', 'password', 'pin_code', 'name', 'email', 'd_o_b', 'last_donation_date', 'blood_type_id', 'city_id');

    protected $hidden = [
        'password',
        'api_token',
        'pin_code'
    ];

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function contactMessages()
    {
        return $this->hasMany('App\Models\ContactMessage');
    }
    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }

    public function bloodTypes()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function articles()
    {
        return $this->belongsToMany('App\Models\Article');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

}