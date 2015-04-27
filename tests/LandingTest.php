<?php

class LandingTest extends TestCase
{
    public function testLanding()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->getStatusCode());

        $this->assertContains(trans('app.name'), $response->getContent());
        $this->assertContains(trans('app.tagline'), $response->getContent());
        $this->assertContains(trans('auth.github_login'), $response->getContent());
    }

    /**
     * A basic functional test example.
     */
    public function testBasicExample()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
    }
}
