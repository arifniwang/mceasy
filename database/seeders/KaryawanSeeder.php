<?php

namespace Database\Seeders;

use App\Models\KaryawanModel;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // get data
        $file = file_get_contents(base_path('database/seeders/file/karyawan.json'));
        $data = json_decode($file);

        // generate data
        foreach ($data as $row) {
            KaryawanModel::query()->insert([
                'nomor_induk' => $row->nomor_induk,
                'nama' => $row->nama,
                'alamat' => $row->alamat,
                'tanggal_lahir' => date('Y-m-d', strtotime($row->tanggal_lahir)),
                'tanggal_bergabung' => date('Y-m-d', strtotime($row->tanggal_bergabung))
            ]);
        }
    }
}
