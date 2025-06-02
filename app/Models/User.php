<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail; // Hapus jika tidak pakai verifikasi email
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // Jika tidak pakai MustVerifyEmail, hapus implementasinya
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        // 'name', // Hapus jika menggunakan first_name & last_name
        'email',
        'password',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected function casts(): array // Untuk Laravel 10+
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Accessor untuk mendapatkan nama lengkap jika menggunakan first_name dan last_name
    public function getNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}