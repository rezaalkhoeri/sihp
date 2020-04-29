<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelatedController extends Controller
{
    //
    public function Index()
    {
        return view('sihp.compliance.related.relatedIndex');
    }

}
