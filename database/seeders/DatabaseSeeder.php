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
        $this->call([
            OrmawaSeeder::class,
        ]);
        User::factory(5)->create();
        Dosen::factory(5)->create();

        User::create([
            'name'       => 'Super Admin',
            'email'      => 'admin@gmail.com',
            'password'   => bcrypt('password'),
            'position'   => 1
        ]);

        Jurusan::insert([
            [
                'jurusan'       => 'MI',
                'nama_jurusan'  => 'Manajemen Informatika',
                'slug'          => 'manajemen-informatika',
            ],
            [
                'jurusan'       => 'MKP',
                'nama_jurusan'  => 'Manajemen Keuangan Perbankan',
                'slug'          => 'manajemen-keuangan-perbankan',
            ],
        ]);
    }
}