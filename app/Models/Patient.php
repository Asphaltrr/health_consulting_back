<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    protected $fillable = [
        'nom_complet',
        'date_de_naissance',
        'sexe',
        'adresse',
        'numero_de_telephone',
        'email',
        'antecedents_medicaux',
        'groupe_sanguin',
        'medicaments_actuels',
        'statut_marital',
        'nombre_enfants',
        'profession',
        'consentement_aux_donnees'
    ];

    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'id_patient');
    }
}
