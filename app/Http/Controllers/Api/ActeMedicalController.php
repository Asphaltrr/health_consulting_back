<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActeMedical;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator; // Import de la façade Validator
use Illuminate\Support\Facades\Log;

class ActeMedicalController extends Controller
{
    // Récupérer tous les actes médicaux
    public function index()
    {
        $actesMedicaux = ActeMedical::all();
        return response()->json($actesMedicaux);
    }

    // Créer un nouvel acte médical
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_traitement' => 'required|exists:traitements,id',
            'description' => 'required|string',
            'date' => 'required|date',
            'heure' => 'required'
        ]);

        $acteMedical = ActeMedical::create($validatedData);
        return response()->json($acteMedical, Response::HTTP_CREATED);
    }

    // Récupérer un acte médical spécifique
    public function show(ActeMedical $acteMedical)
    {
        return response()->json($acteMedical);
    }

    // Mettre à jour un acte médical
    public function update(Request $request, ActeMedical $acteMedical)
    {
        $validatedData = $request->validate([
            'description' => 'string',
            'date' => 'date',
            'heure' => ''
        ]);

        $acteMedical->update($validatedData);
        return response()->json($acteMedical);
    }

    // Supprimer un acte médical
    public function destroy(ActeMedical $acteMedical)
    {
        $acteMedical->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
