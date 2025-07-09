<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'price',
        'type_room_id'
    ];

    // Imagens do quarto
    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }

    // Características (features) do quarto
    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    // Tipo do quarto
    public function typeRoom()
    {
        return $this->belongsTo(TypeRoom::class, 'type_room_id');
    }
}

