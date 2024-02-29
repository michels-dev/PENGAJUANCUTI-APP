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
                'nik' => '0123290',
                'email' => 'michel.sinambela@bpkpenaburjakarta.or.id',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Eka Muliawan',
                'nik' => '0123291',
                'email' => 'eka.muliawan@bpkpenaburjakarta.or.id',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Dahliani Surya',
                'nik' => '0123292',
                'email' => 'dahliani.surya@bpkpenaburjakarta.or.id',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Antoni Andi Wijaya',
                'nik' => '0123293',
                'email' => 'antoni.wijaya@bpkpenaburjakarta.or.id',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Marco Tuwanakotta',
                'nik' => '0123294',
                'email' => 'marco.tuwanakotta@bpkpenaburjakarta.or.id',
                'password' => Hash::make('users123'),
                'role' => 'user',
            ],
            [
                'name' => 'Marta Wea',
                'nik' => '0123295',
                'email' => 'marta.wea@bpkpenaburjakarta.or.id',
                'password' => Hash::make('users123'),
                'role' => 'user',
            ],
            [
                'name' => 'Paulus Samotana Zalukhu',
                'nik' => '0123296',
                'email' => 'paulus.zalukhu@bpkpenaburjakarta.or.id',
                'password' => Hash::make('users123'),
                'role' => 'user',
            ],
        ]);
    }
}
