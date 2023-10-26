<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'role-list',
                'description' => 'Permission list',
            ],
            [
                'name' => 'role-create',
                'description' => 'User can create list',
            ],
            [
                'name' => 'role-edit',
                'description' => 'User can edit list',
            ],
            [
                'name' => 'role-delete',
                'description' => 'User can delete list',
            ],
        ];

        foreach ($permissions as $permissionData) {
            Permission::create([
                'name' => $permissionData['name'],
                'description' => $permissionData['description'],
            ]);
        }
    }
}
