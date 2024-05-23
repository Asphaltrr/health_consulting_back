<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chambre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator; // Import de la façade Validator
use Illuminate\Support\Facades\Log;

class ChambreController extends Controller
{
    // Créer une nouvelle chambre
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_lits' => 'required|integer|min:1', // Nombre de lits requis, doit être un entier positif
            'etage' => 'required|integer', // Étage requis, doit être un entier
            'numero_chambre' => 'required|string|unique:chambres,numero_chambre' // Numéro de chambre requis, doit être unique dans la table
        ]);

        $chambre = Chambre::create($validatedData);
        return response()->json($chambre, Response::HTTP_CREATED);
    }

    // Mettre à jour une chambre
    public function update(Request $request, Chambre $chambre)
    {
        $validatedData = $request->validate([
            'nombre_lits' => 'integer|min:1', // Nombre de lits, entier positif
            'etage' => 'integer', // Étage, entier
            'numero_chambre' => 'string|unique:chambres,numero_chambre,' . $chambre->id // Numéro de chambre, doit être unique, exclure l'ID actuel pour permettre l'actualisation
        ]);

        $chambre->update($validatedData);
        return response()->json($chambre);
    }
}

