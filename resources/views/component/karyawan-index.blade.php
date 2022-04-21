<table class="table table-bordered w-100">
    <thead>
        <tr>
            <th>Nomor Induk</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Tanggal Bergabung</th>
            <th class="text-center"><i class="bi bi-gear"></i></th>
        </tr>
    </thead>
    <tbody>
        <tr v-if="loadIndex">
            <td class="line loading-shimmer" colspan="6"></td>
        </tr>
        <template v-if="!loadIndex && tab === 'karyawan'">
            <tr v-for="(row, i) in data">
                <td>@{{ row.nomor_induk }}</td>
                <td>@{{ row.nama }}</td>
                <td>@{{ row.alamat }}</td>
                <td>@{{ row.tanggal_lahir }}</td>
                <td>@{{ row.tanggal_bergabung }}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm p-0" @click="karyawanDetail(row.nomor_induk)">
                        <i class="bi bi-eye"></i>
                    </button>
                    <button type="button" class="btn btn-sm p-0" @click="edit(i)">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button type="button" class="btn btn-sm p-0" @click="karyawanDelete(row.nomor_induk)">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
        </template>
    </tbody>
</table>
