<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 🔹 Adicione esta linha
use Illuminate\Database\Eloquent\Model;

class TypeMassage extends Model
{
    protected $table = 'type_massage';
    use HasFactory; 

    protected $fillable = [
        'massage_title',
        'image',
        'description',
        'price',
        
    ];
}