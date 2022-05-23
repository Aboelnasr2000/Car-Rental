<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    use HasFactory;


    public function User(){

        return $this->hasOne(User::class);
    }

    public function CarModels(){
        return $this->hasMany(Car::class);

    }
}
