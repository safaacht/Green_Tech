<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $permissions = [
            'product-create',
            'product-edit',
            'product-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $client = Role::firstOrCreate(['name' => 'client']);
        $editeur = Role::firstOrCreate(['name' => 'Éditeur']);
        $gestionnaire = Role::firstOrCreate(['name' => 'Gestionnaire']);

        
        $admin->syncPermissions($permissions);
        $editeur->syncPermissions(['product-edit']);
        $gestionnaire->syncPermissions(['product-create', 'product-delete']);
    }
}
