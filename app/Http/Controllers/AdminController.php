<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function loginIndex()
    {
        return view('sihp.auth.login');
    }

    public function userIndex()
    {
        return view('sihp.administrator.user_management.userIndex');
    }

    public function rolesIndex()
    {
        return view('sihp.administrator.roles.rolesIndex');
    }

    public function logIndex()
    {
        return view('sihp.administrator.audit_log.logIndex');
    }

}
