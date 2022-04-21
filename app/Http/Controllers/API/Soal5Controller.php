<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\KaryawanModel;

class Soal5Controller extends Controller
{
    /**
     * Menampilkan sisa cuti tiap karyawan adalah 12 hari.
     * Daftar berisikan (nomor_induk, nama, sisa_cuti)
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Data found',
            'data' => KaryawanModel::soal5()
        ]);
    }
}
