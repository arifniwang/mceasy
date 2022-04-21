<?php

namespace Database\Seeders;

use App\Models\CutiModel;
use Illuminate\Database\Seeder;

class CutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // get data
        $file = file_get_contents(base_path('database/seeders/file/cuti.json'));
        $data = json_decode($file);

        // generate data
        foreach ($data as $row) {
            CutiModel::query()->insert([
                'nomor_induk' => $row->nomor_induk,
                'tanggal_cuti' => date('Y-m-d', strtotime($row->tanggal_cuti)),
                'lama_cuti' => $row->lama_cuti,
                'keterangan' => $row->keterangan
            ]);
        }
    }
}
