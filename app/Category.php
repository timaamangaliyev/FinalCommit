<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function categories()
    {
       return $this->belongsToMany('App\Category', 'prod__categories', 'id_prod', 'id_category');
    }
}
