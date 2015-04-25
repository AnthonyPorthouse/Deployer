<?php

namespace Deployer\Commands;

use Laravel\Socialite\Two\User;

class CreateUserFromGithub extends Command
{
    public $name;
    public $email;
    public $token;

    /**
     * Create a new command instance.
     */
    public function __construct(User $user)
    {
        $this->name = $user->getName();
        $this->email = $user->getEmail();
        $this->token = $user->token;
    }
}
