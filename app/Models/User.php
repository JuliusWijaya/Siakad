<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

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