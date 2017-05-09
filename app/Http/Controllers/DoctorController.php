<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Appointment;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function create_doctor(Request $request) {
        $d = new Doctor();
        $d->fill($request->json()->all());
        $d->save();
        return response()->json(array('id' => $d->id));
    }
    
    public function edit_doctor(Request $request, $d_id) {
        $d = Doctor::find($d_id);
        $d->fill($request->json()->all());
        $d->save();
        return response()->json($d);
    }
    
    public function delete_doctor($d_id) {
        Doctor::destroy($d_id);
        return response()->json(array('id' => $d_id));
    }
    
    public function read_doctor($d_id) {
        $d = Doctor::find($d_id);
        return response()->json($d);
    }
    
    public function read_doctor_appointments(Request $request, $d_id) {
        if ($request->isMethod('get')) {
            return response()->json(Doctor::find($d_id)->appointmnts()->getResults());
        }
    }
    
    public function read_doctor_appointment($d_id, $a_id) {
        return response()->json(Appointment::where(array(
            array('id', intval($a_id)),
            array('DOCTOR_id', intval($d_id))
            ))->get()[0]);            
    }
    
    public function read_doctors() {
        return response()->json(Doctor::all());
    }
    
    public function read_doctors_by_speciality($s_id) {
        return response()->json(Doctor::where(array(array('SPECIALITY_id', intval($s_id))))->get());
    }
}
