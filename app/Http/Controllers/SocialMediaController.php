<?php

namespace App\Http\Controllers;

use App\Models\SocialAuth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use League\OAuth1\Client\Credentials\CredentialsException;
class SocialMediaController extends Controller
{
    
    public function redirectToProvider($provider)
    {
        try {
            return Socialite::driver($provider)->redirect();
        } catch (CredentialsException $e) {
            
            dd($e->getMessage());
        }
        
    }

    public function handleProviderCallback($provider)
    {       
        $user = Socialite::driver($provider)->user();

        $socialAuth = SocialAuth::updateOrCreate(
            ['social_id' => $user->id, 'provider' => $provider],
            [
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                
            ]
        );
        dd($socialAuth);

       

        return redirect()->route('/schedules')->with('success', 'Autenticación exitosa con ' . ucfirst($provider));
    }

} 
