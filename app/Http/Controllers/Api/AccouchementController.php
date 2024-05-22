<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Accouchement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccouchementController extends Controller
{
    // Récupérer tous les accouchements
    public function index()
    {
        $accouchements = Accouchement::all();
        return response()->json($accouchements);
    }

    // Créer un nouvel accouchement
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_hospitalisation' => 'required|exists:hospitalisations,id',
            'date_accouchement' => 'required|date',
            'heure_accouchement' => 'required',
            'details' => 'required|string',
            'remarques' => 'nullable|string'
        ]);

        $accouchement = Accouchement::create($validatedData);
        return response()->json($accouchement, Response::HTTP_CREATED);
    }

    // Récupérer un accouchement spécifique
    public function show(Accouchement $accouchement)
    {
        return response()->json($accouchement);
    }

    // Mettre à jour un accouchement
    public function update(Request $request, Accouchement $accouchement)
    {
        $validatedData = $request->validate([
            'date_accouchement' => 'date',
            'heure_accouchement' => '',
            'details' => 'string',
            'remarques' => 'nullable|string'
        ]);

        $accouchement->update($validatedData);
        return response()->json($accouchement);
    }

    // Supprimer un accouchement
    public function destroy(Accouchement $accouchement)
    {
        $accouchement->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

