<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DoctorPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $permissions = [
            'create-doctors',
            'edit-doctors',
            'delete-doctors',
            'view-doctors',
            'create-new-patient-disease-record',
            'create-new-patient-allergy'
        ];

        // Seed the permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::where('name', 'admin')->first();
        if (!$adminRole) {
            $adminRole = Role::create(['name' => 'admin']);
        }

        foreach ($permissions as $permission) {
            $adminRole->givePermissionTo($permission);
        }
    }
}
