<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Socialite;
use Laravel\Socialite\AbstractUser;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */

    public function verifyAuth()
    {
        // check the value returned by login()
        // if no value, what does it return?
        if (login() === null)
        {
            return false;
        }
        return true;
    }

    public function login()
    {
        //this function doesn't work
        $data = handleProviderCallback();

        //temporarily return view as well as $user
        return view('auth')->with($userData);
    }

    private function findOrCreateUser($githubUser)
    {
        if ($authUser = User::where('github_id', $githubUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'avatar' => $githubUser->avatar
        ]);
    }

    // public function handleProviderCallback()
    // {
    //     $user = Socialite::driver('github')->user();

    //     return $user;
    // }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/github');
        }

        $authUser = $this->findOrCreateUser($user);
        dd($authUser);

        Auth::login($authUser, true);
        return Redirect::to('auth');
    }

}