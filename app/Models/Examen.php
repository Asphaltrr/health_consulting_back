<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $table = 'examens';
    protected $fillable = [
        'id_consultation', 'description', 'noms_fichiers', 'paths_fichiers'
    ];
    
    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'id_consultation');
    }
}
