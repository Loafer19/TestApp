<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('users')->insert([
            [
                'name' => 'Director 1',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123123123'),
            ],
            [
                'name' => 'user 1',
                'email' => '123admin@gmail.com',
                'password' => Hash::make('123123123'),
            ],
        ]);

        \DB::table('company')->insert([
            [
                'name' => 'Test-App',
                'description' => 'descrition',
                'master_id' => '1',
            ],
            
        ]);

        \DB::table('bills')->insert([
            [
                'user_id' => '2',
                'type' => 'card',
                'currency' => 'usd',
                'value' => '3456',
                'description' => 'descrition',
                'created_at' => '2019-01-20 00:05:55',
            ],
            
        ]);

        \DB::table('company_user')->insert([
            [
                'user_id' => '1',
                'company_id' => '1'
            ],
            [
                'user_id' => '2',
                'company_id' => '1'
            ],
        ]);

    }
}
