<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

            $roles = [
                ['name' => 'admin', 'guard_name' => 'api'],
                ['name' => 'registrar', 'guard_name' => 'api'],
                ['name' => 'user', 'guard_name' => 'api'],
            ];

            resolve('Role')->insert($roles);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
