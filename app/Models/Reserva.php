<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quarto_id', // Certifique-se de que seja "room_id" e não "quarto_id"
        'data_checkin',
        'data_checkout',
        'numero_adultos',
        'numero_criancas'
    ];
}
