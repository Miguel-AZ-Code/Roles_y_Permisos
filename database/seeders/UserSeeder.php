<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'ci' => '14578945',
            'name' => 'admin',
            'telefono' => '+59178945632',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ])->assignRole('Admin');

        User::factory(20)->create();
    }
}
