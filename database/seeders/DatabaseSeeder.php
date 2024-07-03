<?php

namespace Database\Seeders;

use App\Models\Prajurit;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'indra',
            'email' => 'indra@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        Prajurit::factory(10)->create();

        Prajurit::factory()->create([
            'nrp'=> '118929',
            'name' => 'popy indra w',
            'pangkat'=> 'klk',
            'korps'=>'elektro',
            'email' => 'indra@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'Mahasiswa'
        ]);
    }
}
