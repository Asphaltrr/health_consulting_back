<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $table = 'consultations';
    protected $fillable = [
        'id_patient', 'id_resultat_consultation', 'date', 'heure', 'temperature', 'poids', 'pression_arterielle', 'frequence_cardiaque', 'frequence_respiratoire', 'motif_visite', 'symptomes', 'diagnostic', 'remarques', 'statut'
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }

    public function resultatConsultation()
    {
        return $this->belongsTo(ResultatConsultation::class, 'id_resultat_consultation');
    }

    public function examens()
    {
        return $this->hasMany(Examen::class, 'id_consultation');
    }

    public function traitements()
    {
        return $this->hasMany(Traitement::class, 'id_consultation');
    }

    public function hospitalisations()
    {
        return $this->hasMany(Hospitalisation::class, 'id_consultation');
    }
}
