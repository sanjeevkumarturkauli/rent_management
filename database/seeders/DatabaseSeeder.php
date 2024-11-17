<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(30)->create();
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'owner']);
        // Role::create(['name' => 'partner']);

        // $admin = User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password'=>Hash::make('Test@123')
        // ]);

        // $owner = User::factory()->create([
        //     'name' => 'owner',
        //     'email' => 'owner@gmail.com',
        //     'password'=>Hash::make('Test@123')
        // ]);

        // $partner = User::factory()->create([
        //     'name' => 'partner',
        //     'email' => 'partner@gmail.com',
        //     'password'=>Hash::make('Test@123')
        // ]);

        // $admin->assignRole('admin');
        // $owner->assignRole('owner');
        // $partner->assignRole('partner');
    }
}
