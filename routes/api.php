<?php

use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\essai;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChambreController;
use App\Http\Controllers\Api\LitController;
use App\Http\Controllers\Api\ExamenController;
use App\Http\Controllers\Api\HospitalisationController;
use App\Http\Controllers\Api\TraitementController;
use App\Http\Controllers\Api\AccouchementController;
use App\Http\Controllers\Api\ObservationController;
use App\Http\Controllers\Api\ActeMedicalController;
use App\Http\Controllers\Api\ResultatConsultationController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return response()->json(['message' => 'API is working!'], 200);
});

/////////////////////////////////[PATIENTS]//////////////////////////////////////////////
// Récupérer tous les patients
Route::get('/voir-patient', [PatientController::class, 'index']);

Route::get('/nombre-patient', [PatientController::class, 'countPatients']);

// Créer un nouveau patient
Route::post('/nouveau-patient', [PatientController::class, 'store']);

// Récupérer un patient spécifique par ID
Route::get('/voir-patient/{patient}', [PatientController::class, 'show']);

// Mettre à jour un patient spécifique par ID
Route::put('/modifier-patient/{patient}', [PatientController::class, 'update']);

// Supprimer un patient spécifique par ID
Route::delete('/supprimer-patient/{patient}', [PatientController::class, 'destroy']);
///////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////[CONSULTATIONS]//////////////////////////////////////

// Récupérer toutes les consultations
Route::get('/voir-consultation', [ConsultationController::class, 'index']);

Route::get('/voir-consultations-du-jour', [ConsultationController::class, 'indexConsultationsDuJour']);

// Créer une nouvelle consultation
Route::post('/nouvelle-consultation', [ConsultationController::class, 'store']);

// Récupérer une consultation spécifique
Route::get('/voir-consultation/{consultation}', [ConsultationController::class, 'show']);

// Mettre à jour une consultation
Route::put('/modifier-consultation/{consultation}', [ConsultationController::class, 'update']);

// Supprimer une consultation
Route::delete('/supprimer-consultation/{consultation}', [ConsultationController::class, 'destroy']);
///////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////[CHAMBRES]///////////////////////////////////////////

// Récupérer toutes les chambres
Route::get('/voir-chambre', [ChambreController::class, 'index']);

// Créer une nouvelle chambre
Route::post('/nouvelle-chambre', [ChambreController::class, 'store']);

// Récupérer une chambre spécifique
Route::get('/voir-chambre/{chambre}', [ChambreController::class, 'show']);

// Mettre à jour une chambre
Route::put('/modifier-chambre/{chambre}', [ChambreController::class, 'update']);

// Supprimer une chambre
Route::delete('/supprimer-chambre/{chambre}', [ChambreController::class, 'destroy']);
///////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////[LITS]///////////////////////////////////////////////
// Récupérer tous les lits
Route::get('/voir-lit', [LitController::class, 'index']);

// Créer un nouveau lit
Route::post('/nouveau-lit', [LitController::class, 'store']);

// Récupérer un lit spécifique
Route::get('/voir-lit/{lit}', [LitController::class, 'show']);

// Mettre à jour un lit
Route::put('/modifier-lit/{lit}', [LitController::class, 'update']);

// Supprimer un lit
Route::delete('/supprimer-lit/{lit}', [LitController::class, 'destroy']);
///////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////[EXAMENS]///////////////////////////////////////////
// Récupérer tous les examens
Route::get('/voir-examen', [ExamenController::class, 'index']);

// Créer un nouvel examen
Route::post('/nouvel-examen', [ExamenController::class, 'store']);

// Récupérer un examen spécifique
Route::get('/voir-examen/{examen}', [ExamenController::class, 'show']);

// Mettre à jour un examen
Route::post('/ajouter-fichiers-examen/{examen}', [ExamenController::class, 'stores']);

// Supprimer un examen
Route::delete('/supprimer-examen/{examen}', [ExamenController::class, 'destroy']);
///////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////[HOSPITALISATIONS]///////////////////////////////////
// Récupérer toutes les hospitalisations
Route::get('/voir-hospitalisation', [HospitalisationController::class, 'index']);

// Créer une nouvelle hospitalisation
Route::post('/nouvelle-hospitalisation', [HospitalisationController::class, 'store']);

// Récupérer une hospitalisation spécifique
Route::get('/voir-hospitalisation/{hospitalisation}', [HospitalisationController::class, 'show']);

// Mettre à jour une hospitalisation
Route::put('/modifier-hospitalisation/{hospitalisation}', [HospitalisationController::class, 'update']);

// Supprimer une hospitalisation
Route::delete('/supprimer-hospitalisation/{hospitalisation}', [HospitalisationController::class, 'destroy']);
//////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////[TRAITEMENTS]///////////////////////////////////////////
// Récupérer tous les traitements
Route::get('/voir-traitement', [TraitementController::class, 'index']);

// Créer un nouveau traitement
Route::post('/nouveau-traitement', [TraitementController::class, 'store']);

// Récupérer un traitement spécifique
Route::get('/voir-traitement/{traitement}', [TraitementController::class, 'show']);

// Mettre à jour un traitement
Route::put('/modifier-traitement/{traitement}', [TraitementController::class, 'update']);

// Supprimer un traitement
Route::delete('/supprimer-traitement/{traitement}', [TraitementController::class, 'destroy']);
///////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////[ACCOUCHEMENTS]///////////////////////////////////////////
// Récupérer tous les accouchements
Route::get('/voir-accouchement', [AccouchementController::class, 'index']);

// Créer un nouvel accouchement
Route::post('/nouvel-accouchement', [AccouchementController::class, 'store']);

// Récupérer un accouchement spécifique
Route::get('/voir-accouchement/{accouchement}', [AccouchementController::class, 'show']);

// Mettre à jour un accouchement
Route::put('/modifier-accouchement/{accouchement}', [AccouchementController::class, 'update']);

// Supprimer un accouchement
Route::delete('/supprimer-accouchement/{accouchement}', [AccouchementController::class, 'destroy']);
///////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////[OBSERVATIONS]///////////////////////////////////////////
// Récupérer toutes les observations
Route::get('/voir-observation', [ObservationController::class, 'index']);

// Créer une nouvelle observation
Route::post('/nouvelle-observation', [ObservationController::class, 'store']);

// Récupérer une observation spécifique
Route::get('/voir-observation/{observation}', [ObservationController::class, 'show']);

// Mettre à jour une observation
Route::put('/modifier-observation/{observation}', [ObservationController::class, 'update']);

// Supprimer une observation
Route::delete('/supprimer-observation/{observation}', [ObservationController::class, 'destroy']);
///////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////[ACTES MEDICAUX]///////////////////////////////////////////
// Récupérer tous les actes médicaux
Route::get('/voir-acte-medical', [ActeMedicalController::class, 'index']);

// Créer un nouvel acte médical
Route::post('/nouvel-acte-medical', [ActeMedicalController::class, 'store']);

// Récupérer un acte médical spécifique
Route::get('/voir-acte-medical/{acteMedical}', [ActeMedicalController::class, 'show']);

// Mettre à jour un acte médical
Route::put('/modifier-acte-medical/{acteMedical}', [ActeMedicalController::class, 'update']);

// Supprimer un acte médical
Route::delete('/supprimer-acte-medical/{acteMedical}', [ActeMedicalController::class, 'destroy']);
///////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////[RESULTATS CONSULTATIONS]//////////////////////////////////////
// Récupérer tous les résultats de consultations
Route::get('/voir-resultats-consultation', [ResultatConsultationController::class, 'index']);

// Créer un nouveau résultat de consultation
Route::post('/nouveau-resultat-consultation', [ResultatConsultationController::class, 'store']);

// Récupérer un résultat de consultation spécifique
Route::get('/voir-resultat-consultation/{resultatConsultation}', [ResultatConsultationController::class, 'show']);

// Mettre à jour un résultat de consultation
Route::put('/modifier-resultat-consultation/{resultatConsultation}', [ResultatConsultationController::class, 'update']);

// Supprimer un résultat de consultation
Route::delete('/supprimer-resultat-consultation/{resultatConsultation}', [ResultatConsultationController::class, 'destroy']);
///////////////////////////////////////////////////////////////////////////////////////
