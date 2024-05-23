<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator; // Import de la façade Validator
use Illuminate\Support\Facades\Log;

class ExamenController extends Controller
{
    // Récupérer tous les examens
    public function index()
    {
        $examens = Examen::all();
        return response()->json($examens);
    }

    // Créer un nouvel examen
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_consultation' => 'required|exists:consultations,id', // Assurez-vous que la consultation existe
            'description' => 'required|json',
            'resultats' => 'nullable|string' // Assumant que c'est un lien vers un PDF ou un champ texte
        ]);

        $examen = Examen::create($validatedData);
        return response()->json($examen, Response::HTTP_CREATED);
    }

    // Récupérer un examen spécifique
    public function show(Examen $examen)
    {
        return response()->json($examen);
    }

    // Mettre à jour un examen
    public function update(Request $request, Examen $examen)
    {
        $validatedData = $request->validate([
            'id_consultation' => 'exists:consultations,id',
            'type' => 'string',
            'date' => 'date',
            'heure' => '',
            'resultats' => 'string'
        ]);

        $examen->update($validatedData);
        return response()->json($examen);
    }

    // Supprimer un examen
    public function destroy(Examen $examen)
    {
        $examen->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
