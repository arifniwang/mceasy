<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\KaryawanCreateRequest;
use App\Http\Requests\KaryawanUpdateRequest;
use App\Models\CutiModel;
use App\Models\KaryawanModel;
use Illuminate\Http\Request;

class Soal1KaryawanController extends Controller
{
    public function index(Request $request)
    {
        // main variable
        $paginate = ($request->get('limit') ? $request->get('limit') : 10);
        $search = $request->get('search');

        // get data
        $data = KaryawanModel::soal1Index($paginate, $search)->items();

        return response()->json([
            'status' => true,
            'message' => (count($data) > 0 ? 'Data found' : 'Data Empty'),
            'data' => $data
        ]);
    }

    public function create(KaryawanCreateRequest $request)
    {
        // insert data
        $act = KaryawanModel::insert([
            'nomor_induk' => $request->input('nomor_induk'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'tanggal_bergabung' => $request->input('tanggal_bergabung')
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
    }

    public function update(KaryawanUpdateRequest $request)
    {
        // update data
        $act = KaryawanModel::where('nomor_induk', '=', $request->input('nomor_induk'))->update([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'tanggal_bergabung' => $request->input('tanggal_bergabung')
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

    public function delete($nomor_induk)
    {
        // find data
        $data = KaryawanModel::find($nomor_induk);

        if ($data) {
            // delete data
            $act = $data->delete();

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
                'message' => 'The selected nomor induk is invalid.',
            ]);
        }
    }

    public function detail($nomor_induk)
    {
        // find data
        $data = KaryawanModel::find($nomor_induk);

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data exists',
                'data' => [
                    'nomor_induk' => $data->nomor_induk,
                    'nama' => $data->nama,
                    'alamat' => $data->alamat,
                    'tanggal_lahir' => $data->tanggal_lahir,
                    'tanggal_bergabung' => $data->tanggal_bergabung,
                    'list_cuti' => CutiModel::getByNomorInduk($nomor_induk) // get data by same nomor induk
                ]
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'The selected nomor induk is invalid.',
            ]);
        }
    }

    public function listNomorInduk()
    {
        $data = KaryawanModel::query()
            ->orderBy('nomor_induk', 'ASC')
            ->pluck('nomor_induk')
            ->toArray();

        return response()->json([
            'status' => true,
            'message' => (count($data) > 0 ? 'Data found' : 'Data Empty'),
            'data' => $data
        ]);
    }
}
