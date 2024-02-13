<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // * Create User
        User::create([
            'name' => 'Rizky Ibrahim',
            'username' => 'rizky66ibrahim',
            'email' => 'rizky66ibrahim@gmail.com',
            'phone_number' => '085932990070',
            'address' => 'Jl. Primadana VII Blok C8 No.28 RT.06/RW.10, Jatisari, Jatiasih, Kota Bekasi 17423',
            'place_of_birth' => 'Jakarta',
            'date_of_birth' => '1998-06-06',
            'profile_picture' => 'https://avatars.githubusercontent.com/u/77129610?v=4',
            'religion' => 'islam',
            'gender' => 'laki-laki',
            'status' => 'active',
            'password' => bcrypt('password'),
        ]);
    }
}
