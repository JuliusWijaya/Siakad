<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table    = 'jurusans';
    protected $fillable = ['jurusan', 'nama_jurusan', 'slug'];

    public function scopeSearch($query, array $gets)
    {
        if (isset($gets['search']) ? $gets['search'] : false) {
            return $query->where('nama_jurusan', 'like', '%' . $gets['search'] . '%')
                ->orWhere('jurusan', 'like', '%' . $gets['search'] . '%');
        }
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'jurusan_id', 'id');
    }
}