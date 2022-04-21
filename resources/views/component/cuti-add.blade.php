<div class="modal fade" id="modalCutiAdd" tabindex="-1" aria-labelledby="modalCutiAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCutiAddLabel">Tambah Data Cuti</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCutiAdd" @submit.prevent="cutiCreate">
                    <div class="mb-3">
                        <label for="nomor_induk" class="col-form-label">Nomor Induk:</label>
                        <select class="form-control" name="nomor_induk" id="nomor_induk" v-model="cuti.nomor_induk"
                            placeholder="Pilih Nomor Induk">
                            <option value="" disabled>Pilih Nomor Induk</option>
                            <option v-for="(nomor_induk, i) in list_nomor_induk" :value="nomor_induk">
                                @{{ nomor_induk }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_cuti" class="col-form-label">Tanggal Cuti:</label>
                        <input type="date" class="form-control" id="tanggal_cuti" name="tanggal_cuti" required
                            placeholder="yyyy-mm-dd" v-model="cuti.tanggal_cuti">
                    </div>
                    <div class="mb-3">
                        <label for="lama_cuti" class="col-form-label">Lama Cuti:</label>
                        <input type="number" class="form-control" id="lama_cuti" name="lama_cuti" required min="1"
                            max="255" v-model="cuti.lama_cuti" min="1" max="12">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="col-form-label">Keterangan:</label>
                        <textarea type="text" class="form-control" id="keterangan" name="keterangan" required min="1" max="255"
                            v-model="cuti.keterangan"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
