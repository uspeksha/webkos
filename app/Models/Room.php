<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    Use HasFactory, softDeletes;

    protected $fillable = [
        'boarding_house_id',
        'name',
        'room_type',
        'square_feet',
        'capacity',
        'price_per_month',
        'is_available',
    ];

    public function boardingHouse()
    {
        return $this->belongsTo(boardingHouse::class);
    }

    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
