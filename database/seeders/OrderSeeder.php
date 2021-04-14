<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert(
            [
                [
                    'Vessel' => 'DKI',
                    'Voyage' => '044',
                    'booking_number' => '5390967',
                    'equipment' => '40CN',
                    'mil_reference' =>'4369423',
                    'unit_number' => 'MATU453955-2',
                    'origin_ramp' => 'LOS ANGELES, CA',
                    'destination_ramp' => 'CROXTON, NJ',
                    'rail_route' => 'LOSAN BNSF KANCY',
                    'consignee_city' => 'MIAMI',
                    'consignee_state' => 'FL',
                    'ramp' => 'HOBBART',
                    'chassis' => 'MATZ946731',
                    'work_price' => '350',
                    'driver_paid' => '100',
                    'fuel_cost' => '20',
                    'status' => 'En espera',
                    'type' => 'Asignado',
                    'latitude' => '',
                    'longitude' => '',
                    'user_id' => '3',
                    'created_at'=>now()
                ],
                [
                    'Vessel' => 'DKI',
                    'Voyage' => '044',
                    'booking_number' => '5390968',
                    'equipment' => '40CN',
                    'mil_reference' =>'4369423',
                    'unit_number' => 'TCNU453955-2',
                    'origin_ramp' => 'LOS ANGELES, CA',
                    'destination_ramp' => 'ALLIANCE, TX',
                    'rail_route' => 'LOSAN BNSF KANCY',
                    'consignee_city' => 'MIAMI',
                    'consignee_state' => 'FL',
                    'ramp' => 'COMMERCE',
                    'chassis' => 'FLXZ946731',
                    'work_price' => '350',
                    'driver_paid' => '100',
                    'fuel_cost' => '20',
                    'status' => 'En espera',
                    'type' => 'Asignado',
                    'latitude' => '',
                    'longitude' => '',
                    'user_id' => '4',
                    'created_at'=>now()
                ],
                [
                    'Vessel' => 'DKI',
                    'Voyage' => '044',
                    'booking_number' => '8940190',
                    'equipment' => '40CN',
                    'mil_reference' =>'4369423',
                    'unit_number' => 'TCNU555119-3',
                    'origin_ramp' => 'LOS ANGELES, CA',
                    'destination_ramp' => 'MIAMI, FL',
                    'rail_route' => 'LOSAN BNSF KANCY',
                    'consignee_city' => 'MIAMI',
                    'consignee_state' => 'FL',
                    'ramp' => 'COMMERCE',
                    'chassis' => null,
                    'work_price' => '350',
                    'driver_paid' => '100',
                    'fuel_cost' => '20',
                    'status' => 'En espera',
                    'type' => 'No asignado',
                    'latitude' => '',
                    'longitude' => '',
                    'user_id' => null,
                    'created_at'=>now()
                ],
                [
                    'Vessel' => 'DKI',
                    'Voyage' => '044',
                    'booking_number' => '8202033',
                    'equipment' => '40CN',
                    'mil_reference' =>'4369423',
                    'unit_number' => 'SEGU467668-8',
                    'origin_ramp' => 'LOS ANGELES, CA',
                    'destination_ramp' => 'MEMPHIS, TN',
                    'rail_route' => 'LOSAN BNSF KANCY',
                    'consignee_city' => 'MIAMI',
                    'consignee_state' => 'FL',
                    'ramp' => 'COMMERCE',
                    'chassis' => null,
                    'work_price' => '350',
                    'driver_paid' => '100',
                    'fuel_cost' => '20',
                    'status' => 'En espera',
                    'type' => 'No asignado',
                    'latitude' => '',
                    'longitude' => '',
                    'user_id' => null,
                    'created_at'=>now()
                ]
            ]
        );
    }
}
