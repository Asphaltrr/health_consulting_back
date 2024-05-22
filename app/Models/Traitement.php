<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traitement extends Model
{
    protected $table = 'traitements';
    protected $fillable = [
        'id_consultation', 'description', 'duree'
    ];
    
    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'id_consultation');
    }

    public function actesMedicaux()
    {
        return $this->hasMany(ActeMedical::class, 'id_traitement');
    }
}
