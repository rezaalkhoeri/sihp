<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComplianceEvalController extends Controller
{
    //
    public function Index()
    {
        return view('sihp.compliance.compliance_eval.complianceEval');
    }

}
