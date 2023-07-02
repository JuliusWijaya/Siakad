<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;

    protected $table    = 'jurusans';
    protected $fillable = ['id_jurusan', 'nama_jurusan', 'slug'];

    public function scopeSearch($query, array $gets)
    {
        if (isset($gets['search']) ? $gets['search'] : false) {
            return $query->where('nama_jurusan', 'like', '%' . $gets['search'] . '%')
                ->orWhere('id_jurusan', 'like', '%' . $gets['search'] . '%');
        }
    }
}