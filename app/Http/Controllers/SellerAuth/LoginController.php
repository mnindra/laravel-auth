<?php

namespace App\Http\Controllers\SellerAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Class needed for login and logout logic
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// Use Auth
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Trait
    use AuthenticatesUsers;

    // where to redirect seller after login
    protected $redirectTo = '/seller_home';

    // Custom guard for seller
    protected function guard()
    {
      return Auth::guard('web_seller');
    }

    public function showLoginForm()
    {
      return view('seller.auth.login');
    }
}
