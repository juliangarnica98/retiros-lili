<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::create(['name'=>'Admin']);
        $role_jefe = Role::create(['name'=>'Jefe']);
        
        //assignRole($role);
        //syncRole([$role_admin,$role_jefe]);
        Permission::create(['name'=>'admin.index'])->syncRoles([$role_admin,$role_jefe]);
        Permission::create(['name'=>'admin.import.excel'])->assignRole($role_jefe);
    }
}
