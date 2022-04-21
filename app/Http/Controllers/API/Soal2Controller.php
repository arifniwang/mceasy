<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\KaryawanModel;

class Soal2Controller extends Controller
{
    /**
     * Menampilkan 3 karyawan yang pertama kali bergabung
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Data found',
            'data' => KaryawanModel::soal2()
        ]);
    }
}
