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

        foreach($tableBooking as $table) {
            Booking::where('table_id',$table->table_id)->delete();
        }

        $data['tables'] = Table::all();

        return view('dashboard', $data);
    }
}
