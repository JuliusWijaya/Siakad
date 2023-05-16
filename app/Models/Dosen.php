<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Dosen extends Model
{
    use HasFactory;

    protected $table   = 'dosens';
    protected $guarded = ['id'];

    // public function getTglLahirAttribute()
    // {
    //     return Carbon::parse($this->attributes['tgl_lahir'])
    //         ->translatedFormat('d F Y');
    // }

    public function scopeFilters($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $filter) {
            return $query->where('nama', 'like', '%' . $filter . '%');
        });
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
