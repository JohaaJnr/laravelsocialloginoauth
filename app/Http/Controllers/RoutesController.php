<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;

class RoutesController extends Controller
{
   public function index(){
       return redirect('/dashboard');
   }

   

   public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
   }
}
