<?php

namespace Deployer\Github;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class Api
{
    protected $client;

    public function __construct($token)
    {
        $this->client = new Client([
            'base_url' => 'https://api.github.com/',
            'defaults' => [
                'headers' => [
                    'Accept' => 'application/vnd.github.v3+json',
                    'Authorization' => 'token '.$token,
                ],
            ],
        ]);
    }

    public function callApi($endpoint)
    {
        $req = $this->client->get($endpoint);

        return new Collection(json_decode($req->getBody()));
    }
}
