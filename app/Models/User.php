<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'prodi_id',
        'level_user',
        'nomor_induk',
        'image',
        'gender',
        'address',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationship
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
