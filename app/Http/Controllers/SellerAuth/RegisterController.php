<?php

namespace App\Http\Controllers\SellerAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validator facade used in validator method
use Illuminate\Support\Facades\Validator;

// Seller Model
use App\Seller;

// Auth facade used in guard
use Auth;

class RegisterController extends Controller
{
    protected $redirectPath = 'seller_home';

    public function showRegistrationForm()
    {
      return view('seller.auth.register');
    }

    // handle registration request for seller
    public function register(Request $request)
    {
      // validates data
      $this->validator($request->all())->validate();

      // create seller
      $seller = $this->create($request->all());

      // authenticates seller
      $this->guard()->login($seller);

      // redirect seller
      return redirect($this->redirectPath);
    }

    // validates user input
    protected function validator(array $data)
    {
      return Validator::make($data, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:sellers',
        'password' => 'required|min:6|confirmed'
      ]);
    }

    // create a new seller instance after a validation
    protected function create(array $data)
    {
      return Seller::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password'])
      ]);
    }

    // get the guard to authenticate Seller
    protected function guard()
    {
      return Auth::guard('web_seller');
    }
}
