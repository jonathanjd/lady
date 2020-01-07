<?php

use App\Calendar;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $calendar = new Calendar();
        $calendar->service = 'Tratamkiento 1';
        $calendar->hour = '08:00:00';
        $calendar->date = Carbon::parse('2020-01-10 00:00:00');
        $calendar->customer_id = 1;
        $calendar->save();
    }
}
