<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function major_category()
    {
        return $this->belongsTo('App\MajorCategory');
    }
}
