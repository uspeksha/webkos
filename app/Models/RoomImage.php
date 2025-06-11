<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomImage extends Model
{
    Use HasFactory, softDeletes;

    protected $fillable = [
        'room_id',
        'image',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
