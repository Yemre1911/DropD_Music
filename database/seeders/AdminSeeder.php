<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Yunus',
            'email' => 'yunusemrecoban1881@hotmail.com',
            'password' => Hash::make('4815162342'),
            'is_admin' => true, // admin olduğunu belirten bir alan ekleyebilirsiniz
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
