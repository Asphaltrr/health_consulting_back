<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hospitalisation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator; // Import de la façade Validator
use Illuminate\Support\Facades\Log;

class HospitalisationController extends Controller
{
    // Récupérer toutes les hospitalisations
    public function index()
    {
        $hospitalisations = Hospitalisation::all();
        return response()->json($hospitalisations);
    }

    // Créer une nouvelle hospitalisation
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_consultation' => 'required|exists:consultations,id',
            'id_lit' => 'required|exists:lits,id',
            'date_entree' => 'required|date',
            'date_sortie' => 'nullable|date|after_or_equal:date_entree',
            'raison' => 'required|string|max:255',
            'statut_hospitalisation' => 'required|in:planifiée,en_cours,terminée'
        ]);

        $hospitalisation = Hospitalisation::create($validatedData);
        return response()->json($hospitalisation, Response::HTTP_CREATED);
    }

    // Récupérer une hospitalisation spécifique
    public function show(Hospitalisation $hospitalisation)
    {
        return response()->json($hospitalisation);
    }

    // Mettre à jour une hospitalisation
    public function update(Request $request, Hospitalisation $hospitalisation)
    {
        $validatedData = $request->validate([
            'id_consultation' => 'exists:consultations,id',
            'id_lit' => 'exists:lits,id',
            'date_entree' => 'date',
            'date_sortie' => 'nullable|date|after_or_equal:date_entree',
            'raison' => 'string|max:255',
            'statut_hospitalisation' => 'in:planifiée,en_cours,terminée'
        ]);

        $hospitalisation->update($validatedData);
        return response()->json($hospitalisation);
    }

    // Supprimer une hospitalisation
    public function destroy(Hospitalisation $hospitalisation)
    {
        $hospitalisation->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
