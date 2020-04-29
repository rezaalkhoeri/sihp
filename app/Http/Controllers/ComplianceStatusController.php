<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComplianceStatusController extends Controller
{
    //
    public function Index()
    {
        return view('sihp.compliance.compliance_status.complianceStatusIndex');
    }

}
