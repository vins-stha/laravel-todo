<?php

use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->delete();
        \App\User::create([
            'email' =>'foo@bar.com',
            'password'=>\Illuminate\Support\Facades\Hash::make('password'),
            'name'=>'foobar'
        ]);
    }
}
