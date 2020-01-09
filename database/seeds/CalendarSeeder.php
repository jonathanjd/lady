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
        // $calendar = new Calendar();
        // $calendar->service = 'Tratamiento 1';
        // $calendar->hour = '08:00:00';
        // $calendar->date = Carbon::parse('2020-01-10 00:00:00');
        // $calendar->customer_id = 1;
        // $calendar->save();
        $calendar = new Calendar();
        $calendar->service = 'Tratamiento 2';
        $calendar->hour = '08:00:00';
        $calendar->date = Carbon::parse('2020-01-11 00:00:00');
        $calendar->customer_id = 1;
        $calendar->save();
        $calendar = new Calendar();
        $calendar->service = 'Tratamiento 3';
        $calendar->hour = '09:00:00';
        $calendar->date = Carbon::parse('2020-01-11 00:00:00');
        $calendar->customer_id = 1;
        $calendar->save();
    }
}
