<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    //
    public function Index()
    {
        return view('sihp.compliance.classification.classificationIndex');
    }

}
