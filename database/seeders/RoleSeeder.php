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
        
        /* 
        Admin => all
        Manager => Ver listado de usurios y ver usuario
        eveloper => Dashboard
         */

        $superadmin = Role::create(['name' => 'Superadmin']);
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'index'])->syncRoles([$superadmin,$admin,$user]);
        Permission::create(['name' => 'show'])->syncRoles([$superadmin,$admin,$user]);
        Permission::create(['name' => 'store'])->syncRoles([$superadmin]);
        Permission::create(['name' => 'create'])->syncRoles([$superadmin]);
        Permission::create(['name' => 'update'])->syncRoles([$superadmin,$admin]);
        Permission::create(['name' => 'delete'])->syncRoles([$superadmin]);
        Permission::create(['name' => 'edit'])->syncRoles([$superadmin,$admin]);
        

    }
}
