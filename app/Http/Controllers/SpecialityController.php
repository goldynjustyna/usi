<?php

namespace App\Http\Controllers;

use App\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function read_speciality($speciality_id) {
        $speciality = Speciality::find($speciality_id);
        return response()->json($speciality);
    }

    public function read_specialities() {
        return response()->json(Speciality::all());
    }
}