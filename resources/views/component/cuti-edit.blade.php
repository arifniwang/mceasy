<div class="modal fade" id="modalCutiEdit" tabindex="-1" aria-labelledby="modalCutiEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCutiEditLabel">Edit Data Cuti</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCutiEdit" @submit.prevent="cutiUpdate">
                    <div class="mb-3">
                        <label for="nomor_induk" class="col-form-label">Nomor Induk:</label>
                        <input type="text" class="form-control" id="nomor_induk" name="nomor_induk" required min="1"
                            max="255" v-model="cuti.nomor_induk" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_cuti" class="col-form-label">Tanggal Cuti:</label>
                        <input type="date" class="form-control" id="tanggal_cuti" name="tanggal_cuti" required
                            placeholder="yyyy-mm-dd" v-model="cuti.tanggal_cuti" readonly>
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
                        <button @click="emptyCuti()" type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
