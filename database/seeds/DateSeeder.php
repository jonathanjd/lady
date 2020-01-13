<?php

use App\Date;
use Illuminate\Database\Seeder;

class DateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $myDate = new Date();
        $myDate->customer_id = 1;
        $myDate->note = 'New Note 1';
        $myDate->service = 'Tratamiento 1';
        $myDate->status = 'programmed';
        $myDate->save();
        $myDate = new Date();
        $myDate->customer_id = 2;
        $myDate->note = 'New Note 2';
        $myDate->service = 'Tratamiento 2';
        $myDate->status = 'programmed';
        $myDate->save();
        $myDate = new Date();
        $myDate->customer_id = 2;
        $myDate->note = 'New Note 3';
        $myDate->service = 'Tratamiento 3';
        $myDate->status = 'programmed';
        $myDate->save();
        $myDate = new Date();
        $myDate->customer_id = 2;
        $myDate->note = 'New Note 4';
        $myDate->service = 'Tratamiento 4';
        $myDate->status = 'programmed';
        $myDate->save();
    }
}
