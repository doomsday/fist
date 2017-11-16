<?php
/**
 * Created by IntelliJ IDEA.
 * User: drpsy
 * Date: 27-Oct-17
 * Time: 22:36
 */

use Furbook\User;
use Tests\TestCase;
use Goutte\Client;

class RenderedViewsTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();

    }

    // Inspect the contents of a rendered view.
    public function testAdminCanEditCat() {
        $user = new User(['id' => 3, 'name' => 'Admin', 'is_admin' => true]);
        $this->be($user);
        $newName = 'Berlioz';
        $this->call('PUT', '/cat/1', ['name' => $newName]);

        $client = new Client();

        $crawler = $client->request('GET', 'http://dev.furbook.com/cat/1');
        $this->assertCount(1, $crawler->filter('h2:contains("'.$newName.'")'));
    }
}