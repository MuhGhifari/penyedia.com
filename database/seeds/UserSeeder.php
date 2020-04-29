<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
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
               'email'=>'admin@admin.com',
               'is_admin'=>'1',
               'password'=> bcrypt('asdfasdf'),
            ],
            [
               'name'=>'User',
               'email'=>'user@user.com',
               'is_admin'=>'0',
               'password'=> bcrypt('asdfasdf'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
