<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class OrdersNAImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Order([
            'Vessel' => $row['vessel'],
            'Voyage'=> $row['voyage'],
            'booking_number'=> $row['booking_number'],
            'equipment'=> $row['equipment'],
            'mil_reference'=> $row['mil_reference'],
            'unit_number'=> $row['unit_number'],
            'origin_ramp'=> $row['origin_ramp'],
            'destination_ramp'=> $row['destination_ramp'],
            'rail_route'=> $row['rail_route'],
            'consignee_city'=> $row['consignee_city'],
            'consignee_state'=> $row['consignee_state'],
            'ramp'=> $row['ramp'],
            'chassis'=> $row['chassis'],
            'work_price'=> $row['flete'],
            'driver_paid'=> $row['pago_chofer'],
            'fuel_cost'=> $row['diesel'],
            'status'=> 'En espera',
            'type'=> 'No asignado',
            'user_id'=> null
        ]);
    }
}
