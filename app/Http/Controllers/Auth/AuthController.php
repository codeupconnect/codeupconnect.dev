<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
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

    private function findOrCreateUser($githubUser)
    {
        if ($authUser = User::where('github_id', $githubUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $githubUser->name,
            'nickname' => $githubUser->nickname,
            'url' => $githubUser->user['url'],
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
        ]);
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/github');
        }
        $authUser = $this->findOrCreateUser($user);
        // $this->login($authUser);
        session([
            'login_' . md5("Illuminate\Auth\Guard") => $authUser->id,
        ]);
        //dd(session()->all());
        return redirect()->action('UsersController@index');
    }

    public function logout()
    {
        session()->flush();
        dd(session()->all());
        return redirect()->action('UsersController@index');
    }
}