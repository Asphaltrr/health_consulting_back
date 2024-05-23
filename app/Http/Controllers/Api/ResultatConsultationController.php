<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ResultatConsultation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator; // Import de la façade Validator
use Illuminate\Support\Facades\Log;


class ResultatConsultationController extends Controller
{
    // Récupérer tous les résultats de consultations
    public function index()
    {
        $resultats = ResultatConsultation::all();
        return response()->json($resultats);
    }

    // Créer un nouveau résultat de consultation
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ordonnance' => 'required|string',
            'resume' => 'required|string'
        ]);

        $resultat = ResultatConsultation::create($validatedData);
        return response()->json($resultat, Response::HTTP_CREATED);
    }

    // Récupérer un résultat de consultation spécifique
    public function show(ResultatConsultation $resultatConsultation)
    {
        return response()->json($resultatConsultation);
    }

    // Mettre à jour un résultat de consultation
    public function update(Request $request, ResultatConsultation $resultatConsultation)
    {
        $validatedData = $request->validate([
            'ordonnance' => 'string',
            'resume' => 'string'
        ]);

        $resultatConsultation->update($validatedData);
        return response()->json($resultatConsultation);
    }

    // Supprimer un résultat de consultation
    public function destroy(ResultatConsultation $resultatConsultation)
    {
        $resultatConsultation->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
