<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PatientController extends Controller
{
    /**
     * Retrieve all patients.
     */
    public function index()
    {
        $patients = Patient::all();
        return response()->json($patients);
    }

    /**
     * Create a new patient.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nom_complet' => 'required|string|max:255',
                'date_de_naissance' => 'required|date',
                'sexe' => 'required|string',
                'adresse' => 'required|string|max:255',
                'numero_de_telephone' => 'required|string|unique:patients,numero_de_telephone',
                'email' => 'nullable|email|unique:patients,email',
                'antecedents_medicaux' => 'nullable|string',
                'groupe_sanguin' => 'nullable|string|max:3',
                'medicaments_actuels' => 'nullable|string',
                'statut_marital' => 'nullable|string|max:255',
                'nombre_enfants' => 'nullable|integer|min:0',
                'profession' => 'nullable|string|max:255',
                'consentement_aux_donnees' => 'nullable|boolean'
            ], [
                'numero_de_telephone.unique' => 'Ce numéro de téléphone est déjà utilisé par un autre patient.',
                'email.unique' => 'Cette adresse email est déjà utilisée par un autre patient.'
            ]);

            $patient = Patient::create($validatedData);
            return response()->json($patient, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur serveur s\'est produite'], 500);
        }
    }

    /**
     * Retrieve a specific patient.
     */
    public function show(Patient $patient)
    {
        return response()->json($patient);
    }

    /**
     * Update a patient.
     */
    public function update(Request $request, Patient $patient)
    {
        try {
            $validatedData = $request->validate([
                'nom_complet' => 'required|string|max:255',
                'date_de_naissance' => 'required|date',
                'sexe' => 'required|string',
                'adresse' => 'string|max:255',
                'numero_de_telephone' => 'string|unique:patients,numero_de_telephone,' . $patient->id,
                'email' => 'nullable|email|unique:patients,email,' . $patient->id,
                'antecedents_medicaux' => 'nullable|string',
                'groupe_sanguin' => 'nullable|string|max:3',
                'medicaments_actuels' => 'nullable|string',
                'statut_marital' => 'nullable|string|max:255',
                'nombre_enfants' => 'nullable|integer|min:0',
                'profession' => 'nullable|string|max:255',
                'consentement_aux_donnees' => 'nullable|boolean'
            ], [
                'numero_de_telephone.unique' => 'Ce numéro de téléphone est déjà utilisé par un autre patient pour cet ID.',
                'email.unique' => 'Cette adresse email est déjà utilisée par un autre patient pour cet ID.'
            ]);

            $patient->update($validatedData);
            return response()->json($patient);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * Delete a patient.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
