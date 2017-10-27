<?php

namespace Tests\Feature;

use Furbook\User;
use Illuminate\Support\Str;
use Tests\TestCase;

use Mockery as M;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    // Run some code after each test.
    public function tearDown()
    {
        // Ensure that we do not have an instance of a mocked object that persists and interferes with future tests.
        M::close();
    }

    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }

    // Verify whether visitors are redirected to the correct page.
    public function testHomepageRedirection() {
        // Simulate a request to our application through Laravel's HTTP kernel.
        $response = $this->call('GET', '/');
        $response->assertRedirect('cat');
    }

    // Make sure that the creation form is not accessible to the users that are not logged in.
    public function testGuestIsRedirected() {
        $response = $this->call('GET', 'cat/create');
        $response->assertRedirect('login');
    }

    // Run a test as if you were a registered user.
    public function testLoggedInUserCanCreateCat() {
        $user = new User([
            'name' => 'John Doe',
            'is_admin' => false,
        ]);
        $this->be($user);
        $response = $this->call('GET', '/cat/create');
        $response->assertStatus(200);
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
