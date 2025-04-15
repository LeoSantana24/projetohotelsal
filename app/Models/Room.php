<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 🔹 Adicione esta linha
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory; 

    protected $fillable = [
        'room_title',
        'image',
        'description',
        'price',
        'room_type'
    ];
    public function images()
{
    return $this->hasMany(RoomImage::class);
}
public function features()
{
    return $this->belongsToMany(Feature::class);
}



}

