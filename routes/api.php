<?php

use App\Calendar;
use App\Customer;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/calendar/{myHour}/{myDate}', function($myHour, $myDate) {

    $getCalendar = Calendar::where('hour', $myHour)->where('date', $myDate)->with('mydate.customer')->get();

    return response(['getCalendar' => $getCalendar], 200);

});

Route::get('/list-calendar/{startDate}/{endDate}', function($startDate, $endStart){

    $listCalendar = Calendar::whereBetween('date', [$startDate, $endStart])->with('mydate')->get();

    return response(['listCalendar' => $listCalendar], 200);

});

Route::get('/list-customer', function(){

    $listCustomer = Customer::all();

    return response()->json([
        'listCustomer' => $listCustomer
    ], 200);

});

