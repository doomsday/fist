<?php

namespace Tests\Feature;

use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Mockery as M;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function tearDown()
    {
        M::close();
    }

    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function testIs() {
        $this->assertTrue(Str::is('/', '/'));
        $this->assertFalse(Str::is('/', ' /'));
        $this->assertFalse(Str::is('/', '/a'));
        $this->assertTrue(Str::is('foo/*', 'foo/bar/baz'));
        $this->assertTrue(Str::is('*/foo', 'blah/baz/foo'));
    }

    public function getProviderMock() {
        $hasher = m::mock('Illuminate\Contracts\Hashing\Hasher');
        $a = $this->getMockClass('Illuminate\Auth\EloquentUserProvider',
            array('createModel'), array($hasher, 'foo'));
        return $a;
    }

}
