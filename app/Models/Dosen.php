<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Cviebrock\EloquentSluggable\Sluggable;

class Dosen extends Model
{
    use HasFactory, Sluggable;

    protected $table   = 'dosens';
    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function scopeFilters($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $filter) {
            return $query->where('nama', 'like', '%' . $filter . '%');
        });
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'dosen_id', 'id');
    }
}