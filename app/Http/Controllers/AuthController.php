<?php

namespace Deployer\Http\Controllers;

use Deployer\Commands\CreateUserFromGithub;
use Deployer\Token;
use Auth;
use Laravel\Socialite\Contracts\Factory as Socialite;

class AuthController extends Controller
{
    protected $socialite;

    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;
    }

    public function githubLogin()
    {
        return $this->socialite->with('github')->scopes(['user:email', 'repo'])->redirect();
    }

    public function auth()
    {
        $user = $this->socialite->with('github')->user();

        $attributes = [
            'type' => 'github',
            'token' => $user->token,
        ];

        $token = Token::firstOrNew($attributes);

        if ($token->user) {
            $user = $token->user;
            Auth::login($user);

            return redirect()->route('home');
        }

        $user = $this->dispatch(new CreateUserFromGithub($user));

        Auth::login($user);

        return redirect()->route('home');
    }
}
