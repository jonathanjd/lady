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
        $calendar->hour = '08:00:00';
        $calendar->date = Carbon::parse('2020-01-12 00:00:00');
        $calendar->date_id = 1;
        $calendar->save();
        $calendar = new Calendar();
        $calendar->hour = '08:00:00';
        $calendar->date = Carbon::parse('2020-01-13 00:00:00');
        $calendar->date_id = 2;
        $calendar->save();
        $calendar = new Calendar();
        $calendar->hour = '09:00:00';
        $calendar->date = Carbon::parse('2020-01-14 00:00:00');
        $calendar->date_id = 3;
        $calendar->save();
        $calendar = new Calendar();
        $calendar->hour = '09:00:00';
        $calendar->date = Carbon::parse('2020-01-14 00:00:00');
        $calendar->date_id = 4;
        $calendar->save();
    }
}
