<?php

namespace Deployer\Http\Controllers;

use Deployer\Github\Api;
use Deployer\User;
use Illuminate\Support\Facades\Auth;

class RepositoryController extends Controller
{
    public function add()
    {
        // Get user token
        /** @var User $user */
        $user = Auth::user();
        $user = $user->with('tokens')->where('id', $user->id)->whereHas('tokens', function ($q) {
            $q->where('type', 'github');
        })->first();

        // Get the Repositories Api
        $api = new Api($user->tokens->first()->token);
        $repositories = $api->callApi('/user/repos');

        // Show our view
        return view('repositories.add')->with([
            'repositories' => $repositories,
        ]);
    }
}
