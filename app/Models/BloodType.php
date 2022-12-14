<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model 
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');

    //for personal blood type
    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    //for blood types notifications
    public function notificationClients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}