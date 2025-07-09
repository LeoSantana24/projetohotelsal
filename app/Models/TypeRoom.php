<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRoom extends Model
{
    use HasFactory;

    protected $table = 'type_room'; 

    
    protected $fillable = [
        'nome', 
        
    ];

    // Relacionamento com a tabela de quartos
    public function rooms()
    {
        return $this->hasMany(Room::class, 'type_room_id');
    }
}
