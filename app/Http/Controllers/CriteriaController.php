<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    //
    public function Index()
    {
        return view('sihp.compliance.criteria.criteriaIndex');
    }

}
