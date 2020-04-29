<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'id' => 1,
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'email' => 'admin@mail.ru',
                'rating_score' => 0,
                'current_token' => '',
                'description' => 'programmer',
                'password' => bcrypt('password'),
                'remember_token' => '',
                'role_id' => 1,
                'city_id' => 1,
                'device_token' => 'testDevice',
                'nickname' => 'Test',
                'image_path' => 'test',
            ],
        ]);
    }
}
