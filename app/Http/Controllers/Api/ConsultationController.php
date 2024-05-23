<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Support\Facades\Validator; // Import de la façade Validator
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::with('patient')->get();
        return response()->json($consultations);
    }


    public function store(Request $request)
    {
        // Convertir les chaînes vides en null
        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($value === "") {
                $input[$key] = null;
            }
        }

        Log::info('Received request with data:', $request->all());
        try {
            $validatedData = Validator::make($input, [
                'id_patient' => 'required|exists:patients,id',
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
                'resultats' => 'nullable|string',
                'traitement' => 'nullable|string'
            ])->validate();

            $consultation = Consultation::create($validatedData);
            return response()->json($consultation, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Failed to create consultation: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error occurred'], 500);
        }
    }

    public function show(Consultation $consultation)
    {
        return response()->json($consultation->load('patient'));
    }

    public function update(Request $request, Consultation $consultation)
    {
        $validatedData = $request->validate([
            'temperature' => 'nullable|numeric',
            'frequence_cardiaque' => 'nullable|numeric',
            'frequence_respiratoire' => 'nullable|numeric',
            'pression_arterielle' => 'nullable|numeric',
            'diagnostic' => 'nullable|string',
            'remarques' => 'nullable|string',
            'symptomes' => 'nullable|string',
            'statut' => 'string'
        ]);

        $consultation->update($validatedData);
        return response()->json($consultation);
    }

    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
