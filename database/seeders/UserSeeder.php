<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Giri Ganteng',
                'username' => 'Giri',
                'password' => bcrypt('pass'),
                'pass' => 'pass',
                'role' => 'admin',
            ],

        ];
        User::insert($users);
    }
}