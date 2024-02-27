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
                'name' => 'Eka Muliawan',
                'email' => 'eka.muliawan@bpkpenaburjakarta.or.id',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Dahliani Surya',
                'email' => 'dahliani.surya@bpkpenaburjakarta.or.id',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Antoni Andi Wijaya',
                'email' => 'antoni.wijaya@bpkpenaburjakarta.or.id',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Marco Tuwanakotta',
                'email' => 'marco.tuwanakotta@bpkpenaburjakarta.or.id',
                'password' => Hash::make('users123'),
                'role' => 'user',
            ],
            [
                'name' => 'Marta Wea',
                'email' => 'marta.wea@bpkpenaburjakarta.or.id',
                'password' => Hash::make('users123'),
                'role' => 'user',
            ],
            [
                'name' => 'Paulus Samotana Zalukhu',
                'email' => 'paulus.zalukhu@bpkpenaburjakarta.or.id',
                'password' => Hash::make('users123'),
                'role' => 'user',
            ],
        ]);
    }
}
