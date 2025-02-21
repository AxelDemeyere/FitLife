<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Creneau extends Model
{
    use HasFactory;


    protected $table = 'creneaux';

    protected $fillable = [
        'date_heure',
        'cours_id',
    ];

    public function cours() : BelongsTo
    {
        return $this->belongsTo(Cours::class, 'cours_id');
    }

    protected function casts()
    {
        return [
            'date_heure' => 'datetime',
        ];
    }
    public function getFormattedDateAttribute() : string
    {
        return $this->date_heure->format('d/m/Y');
    }
}
