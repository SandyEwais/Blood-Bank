<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Searchable;

class Article extends Model 
{
    use Searchable;

    public $columns = array('title', 'content');

    protected $table = 'articles';
    public $timestamps = true;
    protected $fillable = array('title', 'image', 'content', 'category_id');

    

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}