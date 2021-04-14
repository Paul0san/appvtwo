<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Gerente']);
        $role3 = Role::create(['name' => 'Driver']);

        Permission::create(['name'=>'Dashboard'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'ordersA.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'ordersA.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'ordersA.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'ordersA.delete'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'ordersN.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'ordersN.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'ordersN.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'ordersN.delete'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'driver.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'driver.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'driver.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'driver.delete'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'reports.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'reports.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'reports.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'reports.delete'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'users.index'])->assignRole($role1);
        Permission::create(['name'=>'users.create'])->assignRole($role1);
        Permission::create(['name'=>'users.edit'])->assignRole($role1);
        Permission::create(['name'=>'users.delete'])->assignRole($role1);

        Permission::create(['name'=>'role.index'])->assignRole($role1);
        Permission::create(['name'=>'role.create'])->assignRole($role1);
        Permission::create(['name'=>'role.edit'])->assignRole($role1);
        Permission::create(['name'=>'role.delete'])->assignRole($role1);

        Permission::create(['name'=>'permission.index'])->assignRole($role1);
        Permission::create(['name'=>'permission.create'])->assignRole($role1);
        Permission::create(['name'=>'permission.edit'])->assignRole($role1);
        Permission::create(['name'=>'permission.delete'])->assignRole($role1);

    }
}
