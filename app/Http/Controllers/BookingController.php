<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Table;
use App\Http\Requests\BookingRequest;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
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
    public function create($id)
    {
        $data['table_id'] = $id;
        // dd($data);

        return view('booking.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\BookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        // dd($request->all());
        $current_time = date('H:i:s');
        $end_time = Booking::where('table_id', $request->table_id)->first();

        $user = Auth::user()->id;
        if(empty($end_time)) {
            $book = new Booking;
            $book->user_id = $user;
            $book->table_id = $request->table_id;
            $book->start_time = $request->start_time;
            $book->end_time = $request->end_time;
            $book->save();
            return redirect()->route('dashboard')->with("SUCCESS", __('Table has been booked successfully'));
        }
        else{
            if($current_time > $end_time) {
                $book = new Booking;
                $book->user_id = $user;
                $book->table_id = $request->table_id;
                $book->start_time = $request->start_time;
                $book->end_time = $request->end_time;
                $book->save();
                return redirect()->route('dashboard')->with("SUCCESS", __('Table has been booked successfully'));
            }
            else{
                return redirect()->back()->withInput()->with("ERROR", __('Failed to booked'));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(BookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}