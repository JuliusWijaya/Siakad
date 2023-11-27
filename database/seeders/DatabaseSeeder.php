<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\User;
use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Dosen::factory(5)->create();
        OrmawaSeeder::class;

        User::create([
            'name'       => 'Super Admin',
            'email'      => 'adminlp3i@gmail.com',
            'password'   => bcrypt('password'),
            'position'   => 1
        ]);

        Jurusan::create([
            'jurusan'       => 'MI',
            'nama_jurusan'  => 'Manajemen Informatika',
            'slug'          => 'manajemen-informatika',
        ]);

        Jurusan::create([
            'jurusan'       => 'MKP',
            'nama_jurusan'  => 'Manajemen Keuangan Perbankan',
            'slug'          => 'manajemen-keuangan-perbankan',
        ]);
    }
}