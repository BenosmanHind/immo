<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function paymentConditions(){
        return $this->hasMany(Paymentcondition::class);

    }
    public function specifications(){
        return $this->hasMany(Specification::class);

    }
    public function papers(){
        return $this->hasMany(Paper::class);

    }
    public function images(){
        return $this->hasMany(Image::class);

    }
    public function user(){
        return $this->belongsTo(User::class);

    }
    public function category(){
        return $this->belongsTo(Category::class);

    }
}
