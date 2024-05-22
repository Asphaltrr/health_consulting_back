<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConsultationController extends Controller
{
    // Récupérer toutes les consultations
    public function index()
    {
        // Charge les consultations et inclut les informations des patients
        $consultations = Consultation::with('patient')->get();
        return response()->json($consultations);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nom_patient' => 'required|string',
                'date' => 'required|date',
                'heure' => 'required',
                'temperature' => 'nullable|numeric|min:0',
                'poids' => 'nullable|numeric|min:0',
                'pression_arterielle' => 'nullable|integer|min:0',
                'frequence_cardiaque' => 'nullable|integer|min:0',
                'frequence_respiratoire' => 'nullable|integer|min:0',
                'motif_visite' => 'nullable|string',
                'symptomes' => 'nullable|string',
                'diagnostic' => 'nullable|string',
                'remarques' => 'nullable|string',
                'statut' => 'nullable|string|in:en attente,consulté,diagnostiqué,hospitalisé'

            ]);

            $patient = Patient::where('nom_complet', $validatedData['nom_patient'])->first();

            if (!$patient) {
                // Utilisation de 404 Not Found au lieu de 400 Bad Request
                return response()->json(['message' => 'Patient not found'], 404);
            }

            // Suppression de 'nom_patient' des données validées
            unset($validatedData['nom_patient']);

            // Ajout de 'id_patient' à $validatedData pour la création de la consultation
            $validatedData['id_patient'] = $patient->id;

            // Création de la consultation avec les données validées
            $consultation = Consultation::create($validatedData);
            return response()->json($consultation, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Amélioration de la sécurité en cachant les détails de l'exception en production
            return response()->json(['error' => 'Internal server error occurred'], 500);
        }
    }




    // Récupérer une consultation spécifique
    public function show(Consultation $consultation)
    {
        // La variable $consultation est automatiquement résolue par Laravel grâce au route model binding
        return response()->json($consultation->load('patient'));
    }

    // Mettre à jour une consultation
    public function update(Request $request, Consultation $consultation)
    {
        // Validation des entrées
        $validatedData = $request->validate([
            'date' => 'required|date',
            'heure' => 'required',
            'temperature' => 'nullable|numeric',
            'frequence_cardiaque' => 'nullable|numeric',
            'frequence_respiratoire' => 'nullable|numeric',
            'pression_arterielle' => 'nullable|numeric',
            'diagnostic' => 'nullable|string',
            'remarques' => 'nullable|string',
            'symptomes' => 'nullable|string',
            'statut' => 'nullable|string'
        ]);

        // Mise à jour de la consultation avec les données validées
        $consultation->update($validatedData);

        // Retourner la consultation mise à jour en JSON
        return response()->json($consultation);
    }

    // Supprimer une consultation
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}


