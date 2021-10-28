<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Table;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        $current_time = date('H:i:s');
        $tableBooking = Booking::where('end_time','<',$current_time)->get();
        // dd($tableBooking);

        // foreach($tableBooking as $table) {
        //     Booking::where('table_id',$table->table_id)->delete();
        // }

        $data['tables'] = Table::all();

        // foreach($data['tables'] as $table) {
        //     $data['bookings'] = Booking::with('tableNames')->where('table_id', $table->id)->get();
        // }
        $data['bookings'] = Booking::with('tableBooked')->get();
        // dd($data);

        return view('dashboard', $data);
    }
}