<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Add Users
         *
         */
        $newAdmin = User::firstOrCreate(['email'    => 'admin@admin.com'], [
            'firstname'     => 'Super',
            'lastname'     => 'Admin',
            'password' => bcrypt('password'),
            "is_verified" => 1,
            "is_active" => 1
        ]);

        $newVendor = User::firstOrCreate(['email'    => 'dammy@vendor.com'], [
            'firstname'     => 'Akinwunmi',
            'lastname'     => 'Damilola',
            'password' => bcrypt('password'),
            "is_verified" => 1,
            "is_active" => 1
        ]);

        $newUser = User::firstOrCreate(['email'    => 'dammy@user.com'], [
            'firstname'     => 'Akinwunmi',
            'lastname'     => 'User',
            'password' => bcrypt('password'),
            "is_verified" => 1,
            "is_active" => 1
        ]);
        if ($newAdmin->wasRecentlyCreated) {
            $newAdmin->assignRole("admin");
        }
        if ($newVendor->wasRecentlyCreated) {
            $newVendor->assignRole("merchant");
        }
        if ($newUser->wasRecentlyCreated) {
            $newUser->assignRole("customer");
        }
    }
}
