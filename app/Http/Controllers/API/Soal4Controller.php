<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CutiModel;
use App\Models\KaryawanModel;

class Soal4Controller extends Controller
{
    /**
     * Menampilkan daftar karyawan yang saat ini pernah mengambil cuti lebih dari satu kali.
     * Daftar berisikan (nomor_induk, nama, tanggal_cuti dan keterangan)
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Data found',
            'data' => KaryawanModel::soal4()
        ]);
    }
}
