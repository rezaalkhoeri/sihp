<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeverityController extends Controller
{
    //
    public function Index()
    {
        return view('sihp.compliance.severity.severityIndex');
    }

}
