<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetaPersil extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang akan digunakan (wajib)
    protected $table = 'peta_persil';

    // Menentukan Primary Key dari tabel
    protected $primaryKey = 'peta_id';

    // Mendefinisikan kolom-kolom yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'persil_id',
        'geojson',
        'panjang_m',
        'lebar_m',
    ];

    // App\Models\PetaPersil.php

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'peta_id')
            ->where('ref_table', 'peta_persil')
            ->orderBy('sort_order');
    }

}
