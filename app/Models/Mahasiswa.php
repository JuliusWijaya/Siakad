<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table   = 'mahasiswas';
    protected $guarded = ['id'];

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
}
