<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplied extends Model
{
    use HasFactory;

    protected $fillable=['supplier_id','item_details','rate','total_cost','quantity','paying','due','card_number','expire_date'];

    public function suppliers(){
        return $this->belongsTo('App\Models\Suppliers','supplier_id');
    }

}
