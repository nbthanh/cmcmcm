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
                'user_name'           =>'admin3',
                'password'            => Hash::make('123456789'),
                'user_nicename'       =>'admin3',
                'user_email'          =>'admin@thanhne.com2',
                'user_activation_key' =>'',
                'user_status'         =>'1',
                'display_name'        => 'Super Admin',
                'user_avatar'         => '',
            ]
        ]);
        //factory(App\User::class,100)->create();
    }
}
