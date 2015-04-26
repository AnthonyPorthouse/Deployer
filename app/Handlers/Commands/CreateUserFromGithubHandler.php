<?php

namespace Deployer\Handlers\Commands;

use Deployer\Commands\CreateUserFromGithub;
use Deployer\Token;
use Deployer\User;

class CreateUserFromGithubHandler
{
    /**
     * Create the command handler.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the command.
     *
     * @param CreateUserFromGithub $command
     *
     * @return User
     */
    public function handle(CreateUserFromGithub $command)
    {
        $user = new User([
            'name' => $command->name,
            'email' => $command->email,
        ]);
        $user->save();

        $token = new Token([
            'type' => 'github',
            'token' => $command->token,
        ]);

        $token->user()->associate($user);
        $token->save();

        return $user;
    }
}
