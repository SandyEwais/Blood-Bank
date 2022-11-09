<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'hospital_name', 'city_id', 'patient_age', 'blood_bags', 'hospital_address', 'patient_phone', 'details', 'latitude', 'longitude', 'client_id', 'blood_type_id');

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function notification()
    {
        return $this->hasOne('App\Models\Notification');
    }

}