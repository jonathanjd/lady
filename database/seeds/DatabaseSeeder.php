<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        factory(App\Customer::class, 50)->create();
        $this->call(DateSeeder::class);
        $this->call(CalendarSeeder::class);
    }
}
