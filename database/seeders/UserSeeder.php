<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert(
        //     [
        //         [
        //             'name' => 'Paulo',
        //             'last_name' => 'Sánchez',
        //             'phone' => '2711539363',
        //             'company' => 'V two logistics',
        //             'email' => 'paulo@gmail.com',
        //             'password' => '$2y$10$N4uqPtSy4uLCA1DdwwEomu7wM.GBTCfiw4F1zJyW.o3iDddjEOQMW'
        //         ],
        //         [
        //             'name' => 'Jose',
        //             'last_name' => 'Vela',
        //             'phone' => '4561236312',
        //             'company' => 'V two logistics',
        //             'email' => 'jose@gmail.com',
        //             'password' => '$2y$10$N4uqPtSy4uLCA1DdwwEomu7wM.GBTCfiw4F1zJyW.o3iDddjEOQMW'
        //         ],
        //         [
        //             'name' => 'Roberto',
        //             'last_name' => 'Espíndola',
        //             'phone' => '4561236311',
        //             'company' => 'V two logistics',
        //             'email' => 'REspindola@gmail.com',
        //             'password' => '$2y$10$N4uqPtSy4uLCA1DdwwEomu7wM.GBTCfiw4F1zJyW.o3iDddjEOQMW'
        //         ],
        //         [
        //             'name' => 'Jacob',
        //             'last_name' => 'Hernández',
        //             'phone' => '2789034512',
        //             'company' => 'V two logistics',
        //             'email' => 'JHernandezV@gmail.com',
        //             'password' => '$2y$10$N4uqPtSy4uLCA1DdwwEomu7wM.GBTCfiw4F1zJyW.o3iDddjEOQMW'
        //         ]
        //     ]
        // );
        User::create(
            [
            'name' => 'Paulo',
            'last_name' => 'Sánchez',
            'phone' => '2711639363',
            'company' => 'V two logistics',
            'email' => 'paulo@gmail.com',
            'password' => '$2y$10$N4uqPtSy4uLCA1DdwwEomu7wM.GBTCfiw4F1zJyW.o3iDddjEOQMW'
            ])->assignRole('Admin');

        User::create(
            [
                'name' => 'Jose',
                'last_name' => 'Vela',
                'phone' => '4561236312',
                'company' => 'V two logistics',
                'email' => 'jose@gmail.com',
                'password' => '$2y$10$N4uqPtSy4uLCA1DdwwEomu7wM.GBTCfiw4F1zJyW.o3iDddjEOQMW'
            ])->assignRole('Gerente');

        User::create(
            [
                'name' => 'Roberto',
                'last_name' => 'Espíndola',
                'phone' => '4561236311',
                'company' => 'V two logistics',
                'email' => 'REspindola@gmail.com',
                'password' => '$2y$10$N4uqPtSy4uLCA1DdwwEomu7wM.GBTCfiw4F1zJyW.o3iDddjEOQMW'
            ])->assignRole('Driver');

        User::create(
            [
                'name' => 'Jacob',
                'last_name' => 'Hernández',
                'phone' => '2789034512',
                'company' => 'V two logistics',
                'email' => 'JHernandezV@gmail.com',
                'password' => '$2y$10$N4uqPtSy4uLCA1DdwwEomu7wM.GBTCfiw4F1zJyW.o3iDddjEOQMW'
            ])->assignRole('Driver');


    }
}
