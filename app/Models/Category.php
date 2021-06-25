<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id','category_name','image'];

    public function product_list(){
        return $this->hasMany('App\Models\Product');
    }
}
