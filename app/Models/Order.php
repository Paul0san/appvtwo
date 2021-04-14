<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'Vessel',
        'Voyage',
        'booking_number',
        'equipment',
        'mil_reference',
        'unit_number',
        'origin_ramp',
        'destination_ramp',
        'rail_route',
        'consignee_city',
        'consignee_state',
        'ramp',
        'chassis',
        'work_price',
        'driver_paid',
        'fuel_cost',
        'status',
        'type',
        'latitude',
        'longitude',
        'user_id'
    ];

    // scope

    public function scopeUnit_Number($query, $unit_number)
    {
        if($unit_number)
            return $query->where('unit_number','LIKE',"%$unit_number%");
    }

    public function scopeChassis($query, $chassis)
    {
        if($chassis)
            return $query->where('chassis','LIKE',"%$chassis%");
    }

    public function scopeBooking_Number($query, $booking_number)
    {
        if($booking_number)
            return $query->where('booking_number','LIKE',"%$booking_number%");
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
