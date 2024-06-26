<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'role' => 'administrator',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Role::insert($roles);
        //
    }
}
