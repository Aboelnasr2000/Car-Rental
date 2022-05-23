<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'Owner_id',
        'Brand',
        'Information',
        'Image',
    ];
    public function Owner(){
        return $this->belongsTo(User::class);
    }
    public function CarBrand(){
        return $this->belongsTo(CarBrand::class);
    }
    public function Office(){
        return $this->belongsTo(Office::class);
    }
   
    use HasFactory;
}

