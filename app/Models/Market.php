<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'address'];

    //****************************Relations**********************

    public function products(){
    	return $this->belongsToMany('App\Models\Product')->withPivot('price');
    }
    
}
