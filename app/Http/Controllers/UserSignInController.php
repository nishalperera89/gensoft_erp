<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSignInController extends Controller
{
    public function checkUserAuthentication(Request $request)
    {
        return $request->all();
    }
}
