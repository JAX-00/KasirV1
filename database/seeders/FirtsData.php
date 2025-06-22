<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class FirtsData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@kasir11.com";
        $user->password = bcrypt('123456');
        $user->peran = 'admin';
        $user->save();
    }
}
