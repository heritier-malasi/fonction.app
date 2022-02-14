<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@codeplaners.com',
                'is_admin'=>'1',
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'User',
               'email'=>'user@codeplaners.com',
                'is_admin'=>'0',
               'password'=> bcrypt('12345678'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
