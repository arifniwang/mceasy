<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CutiRequest;
use App\Models\CutiModel;
use Illuminate\Http\Request;

class Soal1CutiController extends Controller
{
    public function index(Request $request)
    {
        // main variable
        $paginate = ($request->get('limit') ? $request->get('limit') : 10);
        $search = $request->get('search');

        // get data
        $data = CutiModel::soal1Index($paginate, $search)->items();

        return response()->json([
            'status' => true,
            'message' => (count($data) > 0 ? 'Data found' : 'Data Empty'),
            'data' => $data
        ]);
    }

    public function create(CutiRequest $request)
    {
        $check = CutiModel::query()
            ->where('nomor_induk', '=', $request->input('nomor_induk'))
            ->where('tanggal_cuti', '=', $request->input('tanggal_cuti'))
            ->count();
        if ($check === 0) {
            // insert data
            $act = CutiModel::insert([
                'nomor_induk' => $request->input('nomor_induk'),
                'tanggal_cuti' => $request->input('tanggal_cuti'),
                'lama_cuti' => $request->input('lama_cuti'),
                'keterangan' => $request->input('keterangan')
            ]);

            if ($act) {
                return response()->json([
                    'status' => true,
                    'message' => 'Data has been created',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong, please try again',
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'The selected nomor induk and tanggal cuti is invalid.',
            ]);
        }
    }

    public function update(CutiRequest $request)
    {
        // update data
        $act = CutiModel::query()
            ->where('nomor_induk', '=', $request->input('nomor_induk'))
            ->where('tanggal_cuti', '=', $request->input('tanggal_cuti'))
            ->update([
                'tanggal_cuti' => $request->input('tanggal_cuti'),
                'lama_cuti' => $request->input('lama_cuti'),
                'keterangan' => $request->input('keterangan')
            ]);

        if ($act) {
            return response()->json([
                'status' => true,
                'message' => 'Data has been updated',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong, please try again',
            ]);
        }
    }

    public function delete($nomor_induk, $tanggal_cuti)
    {
        // find data
        $data = CutiModel::where([
            'nomor_induk' => $nomor_induk,
            'tanggal_cuti' => $tanggal_cuti
        ])->first();

        if ($data) {
            // delete data
            $act = CutiModel::where([
                'nomor_induk' => $nomor_induk,
                'tanggal_cuti' => $tanggal_cuti
            ])->delete();

            if ($act) {
                return response()->json([
                    'status' => true,
                    'message' => 'Data has been deleted',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong, please try again',
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'The selected nomor induk and tanggal cuti is invalid.',
            ]);
        }
    }
}
