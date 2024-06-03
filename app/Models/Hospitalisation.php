<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospitalisation extends Model
{
    protected $table = 'hospitalisations';
    protected $fillable = [
        'id_consultation', 'id_lit', 'date_entree', 'date_sortie', 'raison'
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'id_consultation');
    }

    public function lit()
    {
        return $this->belongsTo(Lit::class, 'id_lit');
    }

    public function observations()
    {
        return $this->hasMany(Observation::class, 'id_hospitalisation');
    }

    public function accouchements()
    {
        return $this->hasMany(Accouchement::class, 'id_hospitalisation');
    }

}
