<?php

use CodeCommerce\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
