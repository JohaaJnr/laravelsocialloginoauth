<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GoogleloginController extends Controller
{
    public function google(){
        return Socialite::driver('google')->redirect();
       }
    
       public function google_callback(){
        $googleUser = Socialite::driver('google')->stateless()->user();
    
        $user = User::where('email', $googleUser->email)->first();
    
        if ($user) {
            $user->update([
                'name'=>$googleUser->name,
                'userid'=>$googleUser->id,
                'password' => $googleUser->token,
                
            ]);
        } else {
            $user = User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'userid' => $googleUser->id,
            'password' => $googleUser->token,
            
            ]);
        }
    
        Auth::login($user);
    
        return redirect('/dashboard')->with('status', 'Login Success');
       }
}
