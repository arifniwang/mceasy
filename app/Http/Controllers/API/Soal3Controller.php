<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CutiModel;
use App\Models\KaryawanModel;

class Soal3Controller extends Controller
{
    /**
     * Menampilkan daftar karyawan yang saat ini pernah mengambil cuti
     * Daftar berisikan (nomor_induk, nama, tanggal_cuti dan keterangan)
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Data found',
            'data' => KaryawanModel::soal3()
        ]);
    }
}
