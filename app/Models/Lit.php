<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lit extends Model
{
    protected $table = 'lits';
    protected $fillable = [
        'id_chambre', 'statut'
    ];

}
