<?php

use App\Calendar;
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

    $getCalendar = Calendar::with('customer')->where('hour', $myHour)->where('date', $myDate)->first();

    return response(['getCalendar' => $getCalendar], 200);

});

Route::get('/list-calendar/{startDate}/{endDate}', function($startDate, $endStart){

    $listCalendar = Calendar::whereBetween('date', [$startDate, $endStart])->get();

    return response(['listCalendar' => $listCalendar], 200);

});



