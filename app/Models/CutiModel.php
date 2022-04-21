<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutiModel extends Model
{
    use HasFactory;

    protected $table = 'cuti';
    protected $primaryKey = ['nomor_induk', 'tanggal_cuti'];
    protected $keyType = ['string', 'string'];
    protected $fillable = [
        'nomor_induk',
        'tanggal_cuti',
        'lama_cuti',
        'keterangan'
    ];
    public $incrementing = false;
    public $timestamps = false;

    public static function soal1Index($paginate = 10, $search = null)
    {
        return self::query()
            ->where(function ($q) use ($search) {
                if ($search) {
                    $q->orWhere('nomor_induk', 'LIKE', '%' . $search . '%');
                    $q->orWhere('tanggal_cuti', 'LIKE', '%' . $search . '%');
                    $q->orWhere('lama_cuti', 'LIKE', '%' . $search . '%');
                    $q->orWhere('keterangan', 'LIKE', '%' . $search . '%');
                }
            })
            ->orderBy('tanggal_cuti', 'DESC')
            ->paginate($paginate);
    }

    public static function getByNomorInduk($nomor_induk)
    {
        return self::where('nomor_induk', '=', $nomor_induk)
            ->orderBy('tanggal_cuti', 'DESC')
            ->get();
    }
}
