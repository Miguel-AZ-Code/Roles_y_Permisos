<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        $role2 = Role::create(['name' => 'Empleado']);
        $role3 = Role::create(['name' => 'Cliente']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        // Usuarios
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$role1]);

        // Roles
        Permission::create(['name' => 'admin.roles.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy'])->syncRoles([$role1]);
    }
}
