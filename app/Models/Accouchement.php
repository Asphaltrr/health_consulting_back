<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accouchement extends Model
{
    protected $table = 'accouchements';
    protected $fillable = [
        'id_hospitalisation', 'date_accouchement', 'heure_accouchement', 'details', 'remarques'
    ];
    public function hospitalisation()
    {
        return $this->belongsTo(Hospitalisation::class, 'id_hospitalisation');
    }
}
