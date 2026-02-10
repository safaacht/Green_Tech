<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin']);
        $client = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'client']);
        $editeur = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'Éditeur']);
        $gestionnaire = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'Gestionnaire']);

        
        $admin->syncPermissions($permissions);
        $editeur->syncPermissions(['product-edit']);
        $gestionnaire->syncPermissions(['product-create', 'product-delete']);
    }
}
