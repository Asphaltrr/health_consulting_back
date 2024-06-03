<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator; // Import de la façade Validator
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class LitController extends Controller
{
    // Récupérer tous les lits
    public function index()
    {
        $lits = Lit::with('chambre')->get();  // Assurez-vous d'avoir la relation 'chambre' bien définie dans le modèle Lit
        return response()->json($lits);
    }

    // Créer un nouveau lit
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_chambre' => 'required|exists:chambres,id', // Assurez-vous que l'ID de la chambre existe
            'statut' => 'string', // Statut doit être l'un des valeurs prédéfinies
            'numero' => [
                'required',
                'integer',
                Rule::unique('lits')->where(function ($query) use ($request) {
                    return $query->where('id_chambre', $request->id_chambre);
                })
            ]
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

