<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Wali extends Model
{
    use HasFactory, Sluggable;

    protected $table      = 'walis';
    protected $primaryKey = 'id';
    protected $fillable   = ['mahasiswa_id', 'nama_wali', 'slug', 'umur', 'pekerjaan'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_wali'
            ]
        ];
    }

    public function scopeFilter($query, array $keyword)
    {
        $query->when($keyword['search'] ?? false, function ($query, $keyword) {
            return $query->where('nama_wali', 'like', '%' . $keyword . '%');
        });
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}