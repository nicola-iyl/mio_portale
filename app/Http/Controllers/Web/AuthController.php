<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function login(Request $request)
   {

   }

   public function showLoginForm()
   {
      $params = [];
      return view('auth.login', $params);
   }
}
