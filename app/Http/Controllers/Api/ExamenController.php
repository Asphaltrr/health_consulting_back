<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator; // Import de la façade Validator
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ExamenController extends Controller
{
    // Récupérer tous les examens
    public function index()
    {
        $examens = Examen::all();
        return response()->json($examens);
    }

    public function show(Examen $examen)
    {
        return response()->json($examen);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_consultation' => 'required|exists:consultations,id', // Assurez-vous que la consultation existe
            'description' => 'required|json',
            'noms_fichiers' => 'nullable|array',
            'paths_fichiers' => 'nullable|array',
        ]);

        $examen = Examen::create($validatedData);
        return response()->json($examen, Response::HTTP_CREATED);
    }

    // ajouter fichier à un examen spécifique
    public function stores(Request $request, $id)
    {
        // Trouver l'examen spécifique avec gestion des erreurs en cas de non-trouvabilité
        $examen = Examen::findOrFail($id);

        if ($request->hasFile('fichiers')) {
            $file = $request->file('fichiers');
            $name = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/examens', $name); // Assurez-vous que le chemin est correct
            $examen->noms_fichiers = json_encode([$file->getClientOriginalName()]);
            $examen->paths_fichiers = json_encode([$path]);
        } else {
            Log::error('Aucun fichier fourni dans la requête');
            return response()->json(['error' => 'No file provided'], 400);
        }

        // Enregistrer les mises à jour dans la base de données
        $examen->save();

        // Retourner une réponse JSON indiquant le succès de l'opération et les détails de l'examen
        return response()->json(['message' => 'Examen updated successfully!', 'examen' => $examen]);
    }




    // Supprimer un examen
    public function destroy(Examen $examen)
    {
        $examen->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
