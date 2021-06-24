<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Permissionitems = [
            [
                'name' => 'view users',
            ],
            [
                'name' => 'create users',
            ],
            [
                'name' => 'edit users',
            ],
            [
                'name' => 'delete users',
            ],
        ];

        /*
         * Add Role Items
         *
         */
        foreach ($Permissionitems as $Permissionitem) {
            Permission::firstOrCreate($Permissionitem);
        }
    }
}
