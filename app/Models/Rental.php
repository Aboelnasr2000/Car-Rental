<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'Car_id',
        'Owner_id',
        'Renter_id',
        'Start_date',
        'End_date',
    ];
    public function Owner(){

        return $this->belongsTo(User::class);
    }
    public function Renter(){

        return $this->belongsTo(User::class);
    }
    public function Car(){

        return $this->belongsTo(Car::class);
    }
    public function Office(){

        return $this->belongsTo(Office::class);
    }
    use HasFactory;
}
