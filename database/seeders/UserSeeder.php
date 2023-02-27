<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'AdminSuranto',
                'nama_petugas' => 'Suranto',
                'level' => 'Admin',
                'password' => bcrypt('admin123'),
            ],
            [
                'username' => 'PetugasTU',
                'nama_petugas' => 'Mugianto',
                'level' => 'Petugas',
                'password' => bcrypt('petugas123'),
            ]
        ];

        foreach ($users as $value){
            User::create($value);
        }
    }
}
