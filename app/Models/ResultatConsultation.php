<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultatConsultation extends Model
{
    protected $table = 'resultat_consultations';
    protected $fillable = [
        'ordonnance', 'resume'
    ];
}

