<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bonus extends Model
{
    Use HasFactory, softDeletes;

    protected $fillable = [
        'boarding_house_id',
        'image',
        'name',
        'description',
        
    ];

    public function boardingHouse()
    {
        return $this->belongsTo(boardingHouse::class);
    }
}
