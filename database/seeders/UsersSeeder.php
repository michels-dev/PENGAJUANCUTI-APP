<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Michel Sinambela',
                'email' => 'michel.sinambela@bpkpenaburjakarta.or.id',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'User A',
                'email' => 'usera@bpkpenaburjakarta.or.id',
                'password' => Hash::make('users123'),
                'role' => 'user',
            ],
            [
                'name' => 'User B',
                'email' => 'userb@bpkpenaburjakarta.or.id',
                'password' => Hash::make('users123'),
                'role' => 'user',
            ],
        ]);
    }
}
