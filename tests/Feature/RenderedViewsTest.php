<?php
/**
 * Created by IntelliJ IDEA.
 * User: drpsy
 * Date: 27-Oct-17
 * Time: 22:36
 */

use Furbook\User;
use Tests\TestCase;

class RenderedViewsTest extends TestCase {

    // Inspect the contents of a rendered view.
    public function testAdminCanEditCat() {
        $user = new User(['id' => 3, 'name' => 'Admin', 'is_admin' => true]);
        $this->be($user);
        $newName = 'Berlioz';
        $this->call('PUT', '/cat/1', ['name' => $newName]);

        $crawler = $this->client->request('GET', '/cat/1'); // FIXME: Find crawler
        $this->assertCount(1, $crawler->filter('h2:contains("'.$newName.'")'));
    }

}