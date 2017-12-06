<?php

use Illuminate\Database\Seeder;

Use Furbook\User;

class UsersTableSeeder extends Seeder {
    public function run() {
        User::create([
            'name' => 'admin',
            'password' => bcrypt('hunter2'),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'scott',
            'password' => bcrypt('tiger'),
            'is_admin' => false,
        ]);
    }
}