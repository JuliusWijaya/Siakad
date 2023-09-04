<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'slug', 'deskripsi', 'user_id'];

    public function penulis()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}