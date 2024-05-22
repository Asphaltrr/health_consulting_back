<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActeMedical extends Model
{
    protected $table = 'actes_medicaux';
    protected $fillable = [
        'id_traitement', 'description', 'date_et_heure'
    ];
    
    public function traitement()
    {
        return $this->belongsTo(Traitement::class, 'id_traitement');
    }
}
