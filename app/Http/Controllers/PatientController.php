<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Appointment;
use Illuminate\Http\Request;

class PatientController extends Controller 
{
    public function create_patient(Request $request) {
        $d = new Patient();
        $d->fill($request->json()->all());
        $d->save();
        return response()->json(array('id' => $d->id));
    }
    
    public function delete_patient($patient_id) {
        Patient::destroy($patient_id);
        return response()->json(['id' => $patient_id]);
    }
    
    public function read_patient($patient_id) {
        $patient = Patient::find($patient_id);
        return response()->json($patient);
    }
    
    public function read_patient_appointments($patient_id) {
        return response()->json(Patient::find($patient_id)->appointments()->getResults());
    }
    
    public function read_patient_appointment($patient_id, $appointment_id) {
	$result = Appointment::all()->where('DOCTOR_id', intval($patient_id))->where('id', intval($appointment_id));
	reset($result);
	if (count($result)) {
	    return response()->json($result{0});
	} else {
	    return response()->json(array());
	}
    }
    
    public function read_patients() {
        return response()->json(Patient::all());
    }
}