<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $RoleItems = [
            [
                'name'        => 'admin',
            ],
            [
                'name'        => 'merchant',
            ],
            [
                'name'        => 'customer',
            ],
        ];


        /*
         * Add Role Items
         *
         */
        foreach ($RoleItems as $RoleItem) {
            $newRoleItem = Role::firstOrCreate($RoleItem);
            $permissions = Permission::all();
            if ($RoleItem["name"] === "admin") {
                $newRoleItem->syncPermissions($permissions);
            }
        }
    }
}
