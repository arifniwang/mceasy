<div class="modal fade" id="modalKaryawanDetail" tabindex="-1" aria-labelledby="modalKaryawanDetailLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKaryawanDetailLabel">Detail Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-md-3 d-flex justify-content-between">
                            <p class="title">Nomor Induk</p> <span>:</span>
                        </div>
                        <div class="col-md-9">@{{ karyawan.nomor_induk }}</div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-3 d-flex justify-content-between">
                            <p class="title">Nama</p> <span>:</span>
                        </div>
                        <div class="col-md-9">@{{ karyawan.nomor_induk }}</div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-3 d-flex justify-content-between">
                            <p class="title">Alamat</p> <span>:</span>
                        </div>
                        <div class="col-md-9">@{{ karyawan.alamat }}</div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-3 d-flex justify-content-between">
                            <p class="title">Tanggal Lahir</p> <span>:</span>
                        </div>
                        <div class="col-md-9">@{{ karyawan.tanggal_lahir }}</div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-3 d-flex justify-content-between">
                            <p class="title">Tanggal Bergabung</p> <span>:</span>
                        </div>
                        <div class="col-md-9">@{{ karyawan.tanggal_bergabung }}</div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-md-3 d-flex justify-content-between">
                            <p class="title">Riwayat Cuti</p> <span>:</span>
                        </div>
                        <div class="col-md-9">
                            <table class="table table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>Tanggal Cuti</th>
                                        <th>Lama Cuti</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="karyawan.list_cuti.length === 0">
                                        <td class="text-center" colspan="3">Empty Record</td>
                                    </tr>
                                    <template v-if="karyawan.list_cuti.length > 0">
                                        <tr v-for="(row, i) in karyawan.list_cuti">
                                            <td>@{{ row.tanggal_cuti }}</td>
                                            <td>@{{ row.lama_cuti }}</td>
                                            <td>@{{ row.keterangan }}</td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
