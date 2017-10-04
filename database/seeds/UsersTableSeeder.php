<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create Admin Credentials
         */
        $user = User::where('first_name', 'Admin')->first();
        if (!$user) {
            $user = User::create([
                'first_name'       => 'Admin',
                'last_name'        => 'Admin',
                'password'         => bcrypt('secret'),
                'email'            => 'admin@demo.com',
            ]);
        }

        /**
         * Create Thato Credentials
         */
        $user = User::where('first_name', 'Thato')->first();
        if (!$user) {
            $user = User::create([
                'first_name'       => 'Thato',
                'last_name'        => 'Babusi',
                'password'         => bcrypt('secret'),
                'email'            => 'thatobabusi@yahoo.com',
            ]);
        }

        /**
         * Create an additional 8 randomly generated users
         */
        factory(App\User::class, 8)->create();
    }
}
