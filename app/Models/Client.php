<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('phone', 'password', 'pin_code', 'name', 'email', 'd_o_b', 'last_donation_date', 'blood_type_id', 'city_id');

    protected $hidden = [
        'password',
        'api_token',
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