<table class="table table-bordered w-100">
    <thead>
        <tr>
            <th>Nomor Induk</th>
            <th>Tanggal Cuti</th>
            <th>Lama Cuti</th>
            <th>Keterangan</th>
            <th class="text-center"><i class="bi bi-gear"></i></th>
        </tr>
    </thead>
    <tbody>
        <tr v-if="loadIndex">
            <td class="line loading-shimmer" colspan="6"></td>
        </tr>
        <template v-if="!loadIndex && tab === 'cuti'">
            <tr v-for="(row, i) in data">
                <td>
                    <a href="javascript:void(0)" @click="karyawanDetail(row.nomor_induk)">@{{ row.nomor_induk }}</a>
                </td>
                <td>@{{ row.tanggal_cuti }}</td>
                <td>@{{ row.lama_cuti }}</td>
                <td>@{{ row.keterangan }}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm p-0" @click="edit(i)">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button type="button" class="btn btn-sm p-0" @click="cutiDelete(i)">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
        </template>
    </tbody>
</table>
