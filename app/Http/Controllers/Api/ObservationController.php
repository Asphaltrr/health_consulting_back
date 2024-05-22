<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Observation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ObservationController extends Controller
{
    // Récupérer toutes les observations
    public function index()
    {
        $observations = Observation::all();
        return response()->json($observations);
    }

    // Créer une nouvelle observation
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_hospitalisation' => 'required|exists:hospitalisations,id',
            'date' => 'required|date',
            'heure' => 'required',
            'description' => 'required|string'
        ]);

        $observation = Observation::create($validatedData);
        return response()->json($observation, Response::HTTP_CREATED);
    }

    // Récupérer une observation spécifique
    public function show(Observation $observation)
    {
        return response()->json($observation);
    }

    // Mettre à jour une observation
    public function update(Request $request, Observation $observation)
    {
        $validatedData = $request->validate([
            'date' => 'date',
            'heure' => '',
            'description' => 'string'
        ]);

        $observation->update($validatedData);
        return response()->json($observation);
    }

    // Supprimer une observation
    public function destroy(Observation $observation)
    {
        $observation->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

