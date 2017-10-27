<?php
/**
 * Created by IntelliJ IDEA.
 * User: drpsy
 * Date: 27-Oct-17
 * Time: 17:57
 */

namespace Tests\Feature;

use Furbook\Cat;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class DatabaseTest extends TestCase {

    // To migrate and seed the database each time a test is run.
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        $this->seed();
    }

    // Test deletion feature.
    public function testOwnerCanDeleteCat() {
        $user = new User(['id' => 1, 'name' => 'User #1', 'is_admin' => false]);
        $this->be($user);
        $response = $this->call('DELETE', '/cat/1');
        $response->assertStatus(302);
        $response->assertRedirect('/cat');
        $response->assertSessionHas('message');
    }

    // Ensure that a user who is not an administrator cannot edit someone else's cat profile.
    public function testNonAdminCannotEditCat() {
        $user = new User(['id' => 2, 'name' => 'User #2', 'is_admin' => false]);
        $this->be($user);
        $response = $this->call('DELETE', '/cat/1');
        $response->assertRedirect('/cats/1');
        $response->assertSessionHas('error');
    }

}

/* We are going to test the editing and deletion features, we are going to need at least one row in the cats table
 * of our database.
 */
class CatsTableSeeder extends Seeder {
    public function run() {
        Cat::create(['id' => 1, 'name' => 'Tom', 'user_id' => 1]);
    }
}