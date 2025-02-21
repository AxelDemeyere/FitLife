<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'creneaux_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creneaux()
    {
        return $this->belongsTo(Creneau::class, 'creneaux_id');
    }
}
