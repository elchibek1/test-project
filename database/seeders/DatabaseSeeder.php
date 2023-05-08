<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'family' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('P@ssw0rd01'), // P@ssw0rd01
            'remember_token' => Str::random(10),
            'admin' => 1,
        ]);

    }
}
