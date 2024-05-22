<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $table = 'examens';
    protected $fillable = [
        'id_consultation', 'description', 'resultats'
    ];
    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'id_consultation');
    }
}
