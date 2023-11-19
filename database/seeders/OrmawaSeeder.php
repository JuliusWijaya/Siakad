<?php

namespace Database\Seeders;

use App\Models\Ormawa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrmawaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ormawa = [
            ['name' => 'BEM'],
            ['name' => 'HMKP'],
            ['name' => 'HMP'],
            ['name' => 'LSC'],
            ['name' => 'LMA'],
            ['name' => 'LCC'],
            ['name' => 'SEAL'],
            ['name' => 'LIAC']
        ];

        foreach ($ormawa as $orm) {
            Ormawa::create($orm);
        }
    }
}