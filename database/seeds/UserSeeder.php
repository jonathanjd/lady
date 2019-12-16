<?php

use App\User;
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
        //
        $user = new User();
        $user->name = 'Jonathan Duran';
        $user->email = 'developer@testing.com';
        $user->password = bcrypt('12345678');
        $user->save();

        $user = new User();
        $user->name = 'Lady Carolina';
        $user->email = 'lady@testing.com';
        $user->password = bcrypt('12345678');
        $user->save();
    }
}
