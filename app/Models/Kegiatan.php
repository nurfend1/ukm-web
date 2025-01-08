<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    // Tentukan nama tabel (jika berbeda dari nama default)
    protected $table = 'activities'; 

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'title', 'description', 'start_date', 'end_date', 'image', 'ukm_id',
    ];

    // Relasi dengan UKM
    public function ukm()
    {
        return $this->belongsTo(Ukm::class, 'ukm_id', 'id'); // Foreign key ukm_id
    }
    
    public function user()
    {
        return $this->belongsToMany(User::class, 'ukm_user', 'ukm_id', 'user_id');
    }
    
}
