<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id','product_name','image','category_id','product_description','product_price'];

    public function categories(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

}
