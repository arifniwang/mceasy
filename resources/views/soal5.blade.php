@extends('template.template')

@section('title', 'Soal 5')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="p-3 text-white bg-dark rounded shadow-sm card-header">
                <h2 class="mb-0 text-white lh-1">Soal 5</h2>
                <p class="mb-0">Menampilkan sisa cuti tiap karyawan adalah 12 hari.</p>
                <p class="mb-0">Daftar berisikan (nomor_induk, nama, sisa_cuti)</p>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor Induk</th>
                            <th>Nama</th>
                            <th>Sisa Cuti</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="loadIndex">
                            <td class="line loading-shimmer" colspan="5"></td>
                        </tr>
                        <template v-if="!loadIndex" v-for="(row, i) in data">
                            <tr>
                                <td>@{{ row.nomor_induk }}</td>
                                <td>@{{ row.nama }}</td>
                                <td>@{{ row.sisa_cuti }}</td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('bottom')
    <script>
        new Vue({
            el: '#app',
            data: {
                loadIndex: true,
                data: [],
            },
            created: function() {
                this.index();
            },
            methods: {
                index() {
                    this.loadIndex = true;

                    axios.get('{{ url('api/soal5') }}').then(resp => {
                        this.loadIndex = false;
                        this.data = resp.data.data;
                    });
                }
            }
        });
    </script>
@endpush
