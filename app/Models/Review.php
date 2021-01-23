<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
   protected $guarded = [];
    //relation between product && reviews 1=>m

    public function products()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
