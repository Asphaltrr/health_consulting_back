<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    protected $table = 'chambres';
    protected $fillable = [
        'nombre_lits', 'etage', 'numero_chambre'
    ];

    public function lits()
    {
        return $this->hasMany(Lit::class, 'id_chambre');
    }
}
