<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'j4kim',
            'email' => 'jivkim@gmail.com'
        ]);

        $user->assignRole([
            Role::create(['name' => 'admin']),
        ]);
    }
}
