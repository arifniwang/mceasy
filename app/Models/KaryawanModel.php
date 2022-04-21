<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KaryawanModel extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $primaryKey = 'nomor_induk';
    protected $keyType = 'string';
    protected $fillable = [
        'nomor_induk',
        'nama',
        'alamat',
        'tanggal_lahir',
        'tanggal_bergabung'
    ];
    public $incrementing = false;
    public $timestamps = false;

    public static function soal1Index($paginate = 10, $search = null)
    {
        return self::query()
            ->where(function ($q) use ($search) {
                if ($search) {
                    $q->orWhere('nomor_induk', 'LIKE', '%' . $search . '%');
                    $q->orWhere('nama', 'LIKE', '%' . $search . '%');
                    $q->orWhere('alamat', 'LIKE', '%' . $search . '%');
                    $q->orWhere('tanggal_lahir', 'LIKE', '%' . $search . '%');
                    $q->orWhere('tanggal_bergabung', 'LIKE', '%' . $search . '%');
                }
            })
            ->orderBy('nomor_induk', 'DESC')
            ->paginate($paginate);
    }

    public static function soal2()
    {
        return self::query()
            ->orderBy('tanggal_bergabung', 'ASC')
            ->orderBy('nomor_induk', 'ASC')
            ->limit(3)
            ->get();
    }

    public static function soal3()
    {
        return self::select(['karyawan.nomor_induk', 'karyawan.nama', 'cuti.tanggal_cuti', 'cuti.keterangan'])
            ->join('cuti', 'cuti.nomor_induk', '=', 'karyawan.nomor_induk')
            ->get();
    }

    public static function soal4()
    {
        return self::select(['karyawan.nomor_induk', 'karyawan.nama', 'cuti.tanggal_cuti', 'cuti.keterangan'])
            ->join('cuti', 'cuti.nomor_induk', '=', 'karyawan.nomor_induk')
            ->havingRaw("(SELECT COUNT(*) FROM cuti WHERE cuti.nomor_induk = karyawan.nomor_induk) > 1")
            ->get();
    }

    public static function soal5()
    {
        return self::select([
            'karyawan.nomor_induk',
            'karyawan.nama',
            DB::raw('IFNULL((12 - (SELECT SUM(cuti.lama_cuti) FROM cuti WHERE cuti.nomor_induk = karyawan.nomor_induk)), 12) as sisa_cuti')
        ])->get();
    }
}
