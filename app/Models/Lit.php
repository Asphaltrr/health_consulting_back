<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lit extends Model
{
    protected $table = 'lits';
    protected $fillable = [
        'id_chambre', 'statut'
    ];

    public function chambre()
    {
        return $this->belongsTo(Chambre::class, 'id_chambre');
    }

}
