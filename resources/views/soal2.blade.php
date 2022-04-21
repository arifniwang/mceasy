@extends('template.template')

@section('title', 'Soal 2')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="p-3 text-white bg-dark rounded shadow-sm card-header">
                <h2 class="mb-0 text-white lh-1">Soal 2</h2>
                <p class="mb-0">Menampilkan 3 karyawan yang pertama kali bergabung.</p>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor Induk</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Tanggal Bergabung</th>
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
                                <td>@{{ row.alamat }}</td>
                                <td>@{{ row.tanggal_lahir }}</td>
                                <td>@{{ row.tanggal_bergabung }}</td>
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

                    axios.get('{{ url('api/soal2') }}').then(resp => {
                        this.loadIndex = false;
                        this.data = resp.data.data;
                    });
                }
            }
        });
    </script>
@endpush
