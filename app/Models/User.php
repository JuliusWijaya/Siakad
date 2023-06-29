<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $guarded    = ['id'];

    public function scopeUser($query, array $get)
    {
        $query->when($get['search'] ?? false, function ($query, $get) {
            return $query->where('name', 'like', '%' . $get . '%')
                ->orWhere('email', 'like', '%' . $get . '%');
        });
    }
}