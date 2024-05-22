<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    protected $table = 'observations';
    protected $fillable = [
        'id_hospitalisation', 'date', 'heure', 'description'
    ];
    public function hospitalisation()
    {
        return $this->belongsTo(Hospitalisation::class, 'id_hospitalisation');
    }
}
