<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $table = 'tracking_products';

    public $fillable = ['product_id','tracking_code','date'];

    public function product()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }
}
