<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persil extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan
    protected $table = 'persil';

    // Primary Key
    protected $primaryKey = 'persil_id';

    // Tambahkan ini ⬇⬇⬇
    public function getRouteKeyName()
    {
        return 'persil_id';
    }

    protected $fillable = [
        'kode_persil',
        'pemilik_warga_id',
        'luas_m2',
        'penggunaan',
        'alamat_lahan',
        'rt',
        'rw',
    ];

    /**
     * Relasi: 1 Persil memiliki banyak DokumenPersil
     */
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id')
            ->where('ref_table', 'persil');
    }

}
