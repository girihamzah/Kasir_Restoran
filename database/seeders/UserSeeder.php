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
                'name' => 'Giwing',
                'username' => 'giwiing1',
                'password' => bcrypt('pass1'),
                'pass' => 'pass1',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Giwing',
                'username' => 'giwiing2',
                'password' => bcrypt('pass2'),
                'pass' => 'pass2',
                'role' => 'kasir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Giwing',
                'username' => 'giwiing3',
                'password' => bcrypt('pass3'),
                'pass' => 'pass3',
                'role' => 'manajer',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];
        User::insert($users);
    }
}