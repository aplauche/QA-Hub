<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubCallback()
    {
        $githubUser = Socialite::driver('github')->user();

        // Can add custom logic here to allow or disallow based on account
        if (strpos($githubUser->email, 'anton') === false) {
            return redirect('/login')->withErrors(['email' => 'Your GitHub account is not allowed to log in.']);
        }

        $user = User::updateOrCreate(
            [
                'github_id' => $githubUser->id
            ],
            [
                'name' => $githubUser->name ?? $githubUser->nickname,
                'email' => $githubUser->email,
                'github_token' => $githubUser->token,
                'github_refresh_token' => $githubUser->refreshToken,
            ]
        );

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
