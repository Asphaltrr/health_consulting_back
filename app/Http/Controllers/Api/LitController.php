<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LitController extends Controller
{
    // Récupérer tous les lits
    public function index()
    {
        $lits = Lit::all();
        return response()->json($lits);
    }

    // Créer un nouveau lit
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_chambre' => 'required|exists:chambres,id', // Assurez-vous que l'ID de la chambre existe
            'statut' => 'required|in:disponible,occupé,entretien' // Statut doit être l'un des valeurs prédéfinies
        ]);

        $lit = Lit::create($validatedData);
        return response()->json($lit, Response::HTTP_CREATED);
    }

    // Récupérer un lit spécifique
    public function show(Lit $lit)
    {
        return response()->json($lit);
    }

    // Mettre à jour un lit
    public function update(Request $request, Lit $lit)
    {
        $validatedData = $request->validate([
            'id_chambre' => 'exists:chambres,id', // Optionnel, assurez-vous que l'ID de la chambre existe si fourni
            'statut' => 'in:disponible,occupé,entretien' // Statut doit être l'un des valeurs prédéfinies
        ]);

        $lit->update($validatedData);
        return response()->json($lit);
    }

    // Supprimer un lit
    public function destroy(Lit $lit)
    {
        $lit->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

