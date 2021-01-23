<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $guarded = [];
    //relation between product && reviews 1=>m

    public function reviews()
    {
        return $this->hasMany('App\Models\Review','product_id');
    }
    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    } 
}
