<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'warga'; // ✅ Tambahkan ini
    protected $primaryKey = 'warga_id';
    protected $guarded = ['warga_id'];
    protected $fillable = [ // ✅ Tambahkan fillable untuk mass assignment
        'nama_lengkap',
        'nik',
        'no_kk',
        'jenis_kelamin',
        'tempat_lahir',
        'alamat_lengkap',
    ];

    // 🔥 RELASI MEDIA (WAJIB)
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id')
                    ->where('ref_table', 'warga');
    }

}
