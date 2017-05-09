<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    protected $except = [
        'doctor/create',
        'doctor/*/edit',
        'doctor/*/delete', 
        'doctor/*/appointment',
	'patient/*/delete',
	'appointment/*/delete',
        'appointment/create',
        'patient/create',
	'patient/*/appointment'
    ];
}
