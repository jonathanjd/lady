<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\Customer;
use App\Date;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $myCustomer = Customer::all();
        $myHour = [8,9,10,11,12,13,14,15,16,17,18,19,20,21,22];

        $myWeekArray = [];
        $myWeek = [0,1,2,3,4,5,6,7,8,9,10,11,12,13];

        foreach ($myWeek as $value) {
            # code...
            $myDate = Carbon::now();
            $myStartWeek = $myDate->startOfWeek();
            if ($value !== 0) {
                # code...
                $myDate = $myStartWeek->addDays($value);
            }
            array_push($myWeekArray, ['myValue' => $myDate, 'myFormatDate' => $myDate->format('d/m/Y')]);
        }

        return view('date.create')->with('myCustomer', $myCustomer)->with('myHour', $myHour)->with('myWeekArray', $myWeekArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //dd($request->all());
        $this->validate($request, [
            'customer_id' => 'required',
            'service' => 'required',
            'hour' => 'required',
            'date' => 'required'
        ]);

        $myDate = new Date();
        $myDate->customer_id = $request->customer_id;
        $myDate->service = $request->service;
        $myDate->note = $request->note;
        $myDate->status = 'programmed';

        if ($myDate->save()) {
            # code...
            $myCalendar = new Calendar();
            $myCalendar->hour = '0' . $request->hour . ':00:00';
            $myCalendar->date = $request->date;
            $myCalendar->date_id = $myDate->id;

            if ($myCalendar->save()) {
                # code...
                return redirect()->back()->with('success', 'Cita creado con Éxito');
            }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
