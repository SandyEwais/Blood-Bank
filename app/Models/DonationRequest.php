<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{
    use Searchable;
    private $columns = ['patient_name', 'hospital_name', 'city_id', 'patient_age', 'blood_bags', 'patient_phone', 'details', 'latitude', 'longitude', 'client_id', 'blood_type_id', 'governorate_id'];
    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'hospital_name', 'city_id', 'patient_age', 'blood_bags', 'patient_phone', 'details', 'latitude', 'longitude', 'client_id', 'blood_type_id', 'governorate_id');
    
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
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