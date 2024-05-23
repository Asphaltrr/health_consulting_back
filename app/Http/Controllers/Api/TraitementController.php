<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Traitement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator; // Import de la façade Validator
use Illuminate\Support\Facades\Log;

class TraitementController extends Controller
{
    // Récupérer tous les traitements
    public function index()
    {
        $traitements = Traitement::all();
        return response()->json($traitements);
    }

    // Créer un nouveau traitement
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_consultation' => 'required|exists:consultations,id',
            'description' => 'required|string',
            'duree' => 'required|integer|min:1' // Durée en jours ou en heures, doit être un entier positif
        ]);

        $traitement = Traitement::create($validatedData);
        return response()->json($traitement, Response::HTTP_CREATED);
    }

    // Récupérer un traitement spécifique
    public function show(Traitement $traitement)
    {
        return response()->json($traitement);
    }

    // Mettre à jour un traitement
    public function update(Request $request, Traitement $traitement)
    {
        $validatedData = $request->validate([
            'description' => 'string',
            'duree' => 'integer|min:1' // Durée en jours ou en heures
        ]);

        $traitement->update($validatedData);
        return response()->json($traitement);
    }

    // Supprimer un traitement
    public function destroy(Traitement $traitement)
    {
        $traitement->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

