<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create_appointment(Request $request) {
        $d = new Appointment();
        $d->fill($request->json()->all());
        $d->save();
        return response()->json(array('id' => $d->id));
    }
    
    public function delete_appointment($appointment_id) {    
        Appointment::destroy($appointment_id);
        return response()->json(['id' => $appointment_id]);
    }
    
    public function read_appointment($appointment_id) {
        $appointment = Appointment::find($appointment_id);
        return response()->json($appointment);
    }
    
    public function read_appointments() {
        return response()->json(Appointment::all());
    }
}