<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ormawa extends Model
{
    use HasFactory;
    protected $table = 'ormawas';
    protected $fillable = ['name'];

    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswas_ormawa', 'ormawa_id', 'mahasiswa_id');
    }
}