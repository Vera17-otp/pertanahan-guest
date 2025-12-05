<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPersil extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang akan digunakan (wajib)
    protected $table = 'dokumen_persil';

    // Menentukan Primary Key dari tabel
    protected $primaryKey = 'dokumen_id';

    // Mendefinisikan kolom-kolom yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'persil_id',
        'jenis_dokumen',
        'nomor',
        'keterangan',
    ];

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'dokumen_id')
            ->where('ref_table', 'dokumen_persil')
            ->orderBy('sort_order');

    }

}
