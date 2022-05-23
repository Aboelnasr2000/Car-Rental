<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{

    public function CarModels(){
        return $this->hasMany(Car::class);

    }
    public function Rentals(){
        return $this->hasMany(Rental::class);

    }

    use HasFactory;
}
