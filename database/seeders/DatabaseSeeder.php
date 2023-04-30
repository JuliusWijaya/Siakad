<?php

namespace Database\Seeders;

use App\Models\jurusan;
use App\Models\Mahasiswa;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

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

        Mahasiswa::create([
            'nim'        => '20212011',
            'nama_mhs'   => 'Kiki Supendi',
            'jk'         => 'Laki-laki',
            'jurusan'    => 'MI',
            'no_hp'      => '081323454789',
            'alamat'     => 'Jl. Rajapolah No. 35',
            'dosen_id'   => 1
        ]);

        Mahasiswa::create([
            'nim'        => '20212012',
            'nama_mhs'   => 'Aura Kasih',
            'jk'         => 'Perempuan',
            'jurusan'    => 'MKP',
            'no_hp'      => '087723454678',
            'alamat'     => 'Jl. Perum Brp No. 45',
            'dosen_id'   => 1
        ]);

        Wali::create([
            'mahasiswa_id'   => 1,
            'nama_wali'      => 'Endang Kusnandar',
            'umur'           => 40,
            'pekerjaan'      => 'PNS'
        ]);

        Wali::create([
            'mahasiswa_id'   => 2,
            'nama_wali'      => 'Haisyam Maulana',
            'umur'           => 26,
            'pekerjaan'      => 'Programmer'
        ]);
    }
}