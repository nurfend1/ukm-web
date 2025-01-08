<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang dapat diisi (mass assignable).
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Menambahkan role ke fillable
    ];

    /**
     * Kolom yang disembunyikan saat serialisasi.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Konversi atribut menjadi tipe data yang sesuai.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Periksa apakah pengguna memiliki role admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Periksa apakah pengguna memiliki role user.
     *
     * @return bool
     */
    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    /**
     * Relasi dengan UKM yang dimiliki pengguna (Many-to-Many).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ukms()
    {
        return $this->belongsToMany(Ukm::class, 'ukm_user', 'user_id', 'ukm_id');
    }

    /**
     * Relasi dengan kegiatan yang dibuat oleh pengguna (One-to-Many).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'user_id', 'id');
    }

    /**
     * Relasi dengan UKM yang dikelola oleh pengguna (Many-to-Many).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function managedUkms()
{
    return $this->belongsToMany(Ukm::class, 'ukm_user', 'user_id', 'ukm_id')
                ->withTimestamps();  // Ensures timestamps are managed by Laravel
}
public function managers()
    {
        return $this->belongsToMany(User::class, 'ukm_user', 'ukm_id', 'user_id');
    }
    /**
     * Update profil pengguna
     *
     * @param  array  $data
     * @return void
     */
    public function updateProfile(array $data)
    {
        // Update hanya kolom yang diperlukan (name dan email)
        $this->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
    }
    
}
