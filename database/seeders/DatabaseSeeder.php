<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        Employee::create([
            'name' => 'A1',
            'pengalaman_kerja' => 0.5,
            'pendidikan' => 1,
            'umur' => 0.7,
            'status' => 0.7,
            'alamat' => 0.8,
        ]);
        Employee::create([
            'name' => 'A2',
            'pengalaman_kerja' => 0.8,
            'pendidikan' => 0.7,
            'umur' => 1,
            'status' => 0.5,
            'alamat' => 1,
        ]);
        Employee::create([
            'name' => 'A3',
            'pengalaman_kerja' => 1,
            'pendidikan' => 0.3,
            'umur' => 0.4,
            'status' => 0.7,
            'alamat' => 1,
        ]);
        Employee::create([
            'name' => 'A4',
            'pengalaman_kerja' => 0.2,
            'pendidikan' => 1,
            'umur' => 0.5,
            'status' => 0.9,
            'alamat' => 0.7,
        ]);
        Employee::create([
            'name' => 'A5',
            'pengalaman_kerja' => 1,
            'pendidikan' => 0.7,
            'umur' => 0.4,
            'status' => 0.7,
            'alamat' => 1,
        ]);
    }
}
