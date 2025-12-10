<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $primaryKey = 'warga_id';
    protected $guarded = ['warga_id'];

    // 🔥 RELASI MEDIA (WAJIB)
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id')
                    ->where('ref_table', 'warga');
    }
}
