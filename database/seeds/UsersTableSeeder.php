<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'user_name'=>'admin',
                'user_pass'=> bcrypt('123456789'),
                'user_nicename'=>'admin',
                'user_email'=>'admin@thanhne.com',
                'user_activation_key'=>'',
                'user_status'=>'1',
                'display_name' => 'Super Admin',
            ]
        ]);
        factory(App\User::class,100)->create();
    }
}
