<?php

namespace Database\Seeders;

use App\Models\jurusan;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Wali;
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

        User::create([
            'name'       => 'Super Admin',
            'email'      => 'adminlp3i@gmail.com',
            'password'   => bcrypt('password'),
            'position'   => 1
        ]);

        jurusan::create([
            'id_jurusan'    => 'MI',
            'nama_jurusan'  => 'Manajemen Informatika',
        ]);

        jurusan::create([
            'id_jurusan'    => 'MKP',
            'nama_jurusan'  => 'Manajemen Keuangan Perbankan',
        ]);
    }
}