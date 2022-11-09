<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('aboutus_text', 'notification_settings_text', 'contact_phone', 'contact_email', 'fb_link', 'insta_link', 'youtube_link', 'tw_link');

}