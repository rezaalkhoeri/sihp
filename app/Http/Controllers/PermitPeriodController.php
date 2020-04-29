<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermitPeriodController extends Controller
{
    //
    public function Index()
    {
        return view('sihp.compliance.permit_period.permitPeriodindex');
    }

}
