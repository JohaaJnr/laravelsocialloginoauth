<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GithubloginController extends Controller
{
    public function github(){
        return Socialite::driver('github')->redirect();
    }

    public function github_callback(){
        $githubUser = Socialite::driver('github')->stateless()->user();
        $user = User::where('email', $githubUser->email)->first();

    if ($user) {
        $user->update([
            'name'=>$githubUser->name,
            'userid'=>$githubUser->id,
            'password' => $githubUser->token,
        ]);
    } else {
        $user = User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'userid'=>$githubUser->id,
            'password' => $githubUser->token,
        ]);
    }

    Auth::login($user);

    return redirect('/dashboard')->with('status', 'Login Success');
    }
}
