<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PertanahanController extends Controller
{
    public function index()
    {
        /* Cara 1 */
        $data['judul']   = 'Administrasi Persil';
        $data['persil']  = [
            'persil_id'        => 1,
            'kode_persil'      => 'PRS001',
            'pemilik_warga_id' => 101,
            'luas_m2'          => 250,
            'penggunaan'       => 'Perumahan',
            'alamat_lahan'     => 'Jl. Melati No. 12',
            'rt'               => '02',
            'rw'               => '05',
        ];
        return view('pertanahan', $data);
    }
}
