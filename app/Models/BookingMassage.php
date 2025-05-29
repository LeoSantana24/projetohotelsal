<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingMassage extends Model
{
    use HasFactory;
    protected $table = 'Bookings_massage';

    protected $fillable = [
        'user_id',
        'type_massage_id',
        'name',
        'email',
        'phone',
        'date',
        'hour',
        'duration',
        'status'
    ];
    
    public function typeMassage()
    {
        return $this->belongsTo(TypeMassage::class, 'type_massage_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
