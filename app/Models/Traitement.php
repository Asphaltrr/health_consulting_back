<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultatConsultation extends Model
{
    protected $table = 'resultat_consultations';
    protected $fillable = [
        'id_consultation', 'ordonnance', 'resume'
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'id_consultation');
    }

}

