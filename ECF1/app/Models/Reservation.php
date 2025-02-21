<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'creneaux_id',
        'cours_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function creneaux(): BelongsTo
    {
        return $this->belongsTo(Creneau::class, 'creneaux_id');
    }

    public function cours(): BelongsTo
    {
        return $this->belongsTo(Cours::class);
    }
}
