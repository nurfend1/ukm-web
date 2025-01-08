<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'ukm'; // Nama tabel di database

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = ['name', 'description','mission','logo_url'];

    // Relasi dengan pengguna (user) yang terlibat dalam UKM
    // Ini bisa menjadi relasi untuk semua pengguna yang terdaftar di UKM
    public function users()
    {
        // Many-to-many relationship with User
        return $this->belongsToMany(User::class, 'ukm_user', 'ukm_id', 'user_id');
    }

    // Relasi dengan pengguna (managers) yang merupakan pengelola (manajer) UKM
    public function managers()
{
    return $this->belongsToMany(User::class, 'ukm_user', 'ukm_id', 'user_id');
}

    // Relasi dengan kegiatan (activities)
    public function activities()
    {
        return $this->hasMany(Kegiatan::class, 'ukm_id', 'id');
    }

    // Mendapatkan kegiatan terbaru
    public function latestActivity()
    {
        return $this->hasOne(Kegiatan::class)->latestOfMany();
    }
}