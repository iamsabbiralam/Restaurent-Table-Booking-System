<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'table_id',
        'start_time',
        'end_time',
    ];

    public function tableBooked() {

        return $this->belongsTo(Table::class, 'table_id');
    }
}