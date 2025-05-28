<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'name',
        'email',
        'phone',
        'start_date',
        'end_date',
        'number_adults',      // Novo campo para número de adultos
        'number_children',     // Novo campo para 
    ];

    public function room()
    {
        return $this->hasOne('App\Models\Room','id','room_id');
        
    }
}
