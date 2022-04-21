<div class="modal fade" id="modalKaryawanEdit" tabindex="-1" aria-labelledby="modalKaryawanEditLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKaryawanEditLabel">Edit Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formKaryawanEdit" @submit.prevent="karyawanUpdate">
                    <div class="mb-3">
                        <label for="nomor_induk" class="col-form-label">Nomor Induk:</label>
                        <input type="text" class="form-control" id="nomor_induk" name="nomor_induk" required min="1"
                            max="255" v-model="karyawan.nomor_induk" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required min="1" max="255"
                            v-model="karyawan.nama">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="col-form-label">Alamat:</label>
                        <textarea type="text" class="form-control" id="alamat" name="alamat" required min="1" max="255"
                            v-model="karyawan.alamat"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required
                            placeholder="yyyy-mm-dd" v-model="karyawan.tanggal_lahir">
                    </div>
                    <div class="mb-5">
                        <label for="tanggal_bergabung" class="col-form-label">Tanggal Bergabung:</label>
                        <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung"
                            required v-model="karyawan.tanggal_bergabung">
                    </div>
                    <div class="modal-footer">
                        <button @click="emptyKaryawan()" type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
