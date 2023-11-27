<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Mahasiswa extends Model
{
    use HasFactory, Sluggable;

    protected $table   = 'mahasiswas';
    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_mhs'
            ]
        ];
    }

    public function scopeFilters($query, array $key)
    {
        $query->when($key['keyword'] ?? false, function ($query, $search) {
            return $query->where('nama_mhs', 'like', '%' . $search . '%')
                ->orWhere('jurusan', 'like', '%' . $search . '%');
        });
    }

    public function wali()
    {
        return $this->hasOne(Wali::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function ormawa()
    {
        return $this->belongsToMany(Ormawa::class, 'mahasiswas_ormawa', 'mahasiswa_id', 'ormawa_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}