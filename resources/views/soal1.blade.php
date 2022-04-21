@extends('template.template')

@section('title', 'Soal 1')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="p-3 text-white bg-dark rounded shadow-sm card-header">
                <h2 class="mb-0 text-white lh-1">Soal 1</h2>
                <small>Buatlah sebuah software untuk menyimpan, mengedit, menghapus dan melihat data
                    kontak dengan menggunakan bahasa yang dikuasai dengantampil semenarik mungkin mungkin</small>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button @click="changeTab('karyawan')" class="nav-link active btn-dark" id="v-pills-karyawan-tab"
                            data-bs-toggle="pill" data-bs-target="#v-pills-karyawan" type="button" role="tab"
                            aria-controls="v-pills-karyawan" aria-selected="true">Karyawan</button>
                        <button @click="changeTab('cuti')" class="nav-link" id="v-pills-cuti-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-cuti" type="button" role="tab" aria-controls="v-pills-cuti"
                            aria-selected="false">Cuti</button>
                    </div>

                    <div class="tab-content w-100" id="v-pills-tabContent">
                        <div class="d-flex justify-content-between mb-3">
                            <button type="button" class="btn btn-dark btn-sm" @click="add">
                                <i class="bi bi-plus-square"></i> Add New
                            </button>
                            <form @submit.prevent="searchSubmit" class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                                    v-model="search" @click="closeSearch">
                                <button class="btn btn-outline-dark" type="submit" @click="searchSubmit">Search</button>
                            </form>
                        </div>
                        <div class="tab-pane fade show active w-100" id="v-pills-karyawan" role="tabpanel"
                            aria-labelledby="v-pills-karyawan-tab">
                            @include('component.karyawan-index')
                        </div>
                        <div class="tab-pane fade" id="v-pills-cuti" role="tabpanel" aria-labelledby="v-pills-cuti-tab">
                            @include('component.cuti-index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('component.karyawan-add')
    @include('component.karyawan-edit')
    @include('component.karyawan-detail')
    @include('component.cuti-add')
    @include('component.cuti-edit')
@endsection

@push('bottom')
    <script>
        new Vue({
            el: '#app',
            data: {
                loadIndex: true,
                tab: "karyawan",
                page: 1,
                limit: 100,
                search: "",
                data: [],
                list_nomor_induk: [],
                karyawan: {
                    nomor_induk: "",
                    nama: "",
                    alamat: "",
                    tanggal_lahir: "",
                    tanggal_bergabung: "",
                    list_cuti: [],
                },
                cuti: {
                    nomor_induk: "",
                    tanggal_cuti: "",
                    lama_cuti: "",
                    keterangan: ""
                },
                modal: null
            },
            created: function() {
                this.karyawanIndex();
            },
            methods: {
                /**
                 * Controller
                 */
                closeSearch(e) {
                    console.log(e.target.value)
                    if (e.target.value) {
                        setTimeout(() => {
                            if (e.target.value === "") {
                                this.searchSubmit();
                            }
                        }, 1);
                    }
                },
                changeTab(tab) {
                    this.tab = tab;
                    this.data = [];
                    this.search = "";
                    this.page = 1;
                    this.loadIndex = true;

                    if (this.tab === 'karyawan') {
                        this.karyawanIndex();
                    } else {
                        this.listNomorInduk();
                        this.cutiIndex();
                    }
                },
                add() {
                    if (this.tab === 'karyawan') {
                        this.modal = new bootstrap.Modal(document.getElementById('modalKaryawanAdd'), {
                            keyboard: false
                        });
                        this.modal.show()
                    } else {
                        this.modal = new bootstrap.Modal(document.getElementById('modalCutiAdd'), {
                            keyboard: false
                        });
                        this.modal.show()
                    }
                },
                edit(i) {
                    if (this.tab === 'karyawan') {
                        this.karyawan = {
                            nomor_induk: this.data[i].nomor_induk,
                            nama: this.data[i].nama,
                            alamat: this.data[i].alamat,
                            tanggal_lahir: this.data[i].tanggal_lahir,
                            tanggal_bergabung: this.data[i].tanggal_bergabung,
                            list_cuti: []
                        }

                        this.modal = new bootstrap.Modal(document.getElementById('modalKaryawanEdit'), {
                            keyboard: false
                        });
                        this.modal.show();
                        document.getElementById('modalKaryawanEdit').addEventListener('hidden.bs.modal', (e) => {
                            this.emptyKaryawan()
                        })
                    } else {
                        this.cuti = {
                            nomor_induk: this.data[i].nomor_induk,
                            tanggal_cuti: this.data[i].tanggal_cuti,
                            lama_cuti: this.data[i].lama_cuti,
                            keterangan: this.data[i].keterangan
                        }
                        this.modal = new bootstrap.Modal(document.getElementById('modalCutiEdit'), {
                            keyboard: false
                        });
                        this.modal.show();
                        document.getElementById('modalCutiEdit').addEventListener('hidden.bs.modal', (e) => {
                            this.emptyCuti()
                        })
                    }
                },
                searchSubmit() {
                    this.data = [];
                    this.loadIndex = true;

                    if (this.tab === 'karyawan') {
                        this.karyawanIndex();
                    } else {
                        this.cutiIndex();
                    }
                },

                /**
                 * Manage Karyawan
                 */
                emptyKaryawan() {
                    this.karyawan = {
                        nomor_induk: "",
                        nama: "",
                        alamat: "",
                        tanggal_lahir: "",
                        tanggal_bergabung: "",
                        list_cuti: []
                    }
                },
                karyawanIndex() {
                    axios.get('{{ url('api/soal1/karyawan') }}', {
                        params: {
                            page: this.page,
                            limit: this.limit,
                            search: this.search,
                        }
                    }).then(resp => {
                        this.loadIndex = false;
                        this.data = resp.data.data;
                    });
                },
                karyawanCreate() {
                    let params = {
                        nomor_induk: this.karyawan.nomor_induk,
                        nama: this.karyawan.nama,
                        alamat: this.karyawan.alamat,
                        tanggal_lahir: this.karyawan.tanggal_lahir,
                        tanggal_bergabung: this.karyawan.tanggal_bergabung
                    }
                    this.loadIndex = true;
                    axios.post('{{ url('api/soal1/karyawan/create') }}', params)
                        .then(resp => {
                            this.loadIndex = false;
                            if (!resp.data.status) {
                                alert(resp.data.message);
                                this.add();
                            } else {
                                this.emptyKaryawan();
                                this.modal.hide();
                                this.changeTab(this.tab);
                            }
                        });
                },
                karyawanUpdate() {
                    let params = {
                        nomor_induk: this.karyawan.nomor_induk,
                        nama: this.karyawan.nama,
                        alamat: this.karyawan.alamat,
                        tanggal_lahir: this.karyawan.tanggal_lahir,
                        tanggal_bergabung: this.karyawan.tanggal_bergabung
                    }
                    this.loadIndex = true;
                    axios.patch('{{ url('api/soal1/karyawan/update') }}', params)
                        .then(resp => {
                            this.loadIndex = false;
                            if (!resp.data.status) {
                                alert(resp.data.message);
                            } else {
                                this.modal.hide();
                                this.changeTab(this.tab);
                            }
                        });
                },
                karyawanDetail(nomor_induk) {
                    this.loadIndex = true;
                    axios.get(`{{ url('api/soal1/karyawan/detail') }}/${nomor_induk}`)
                        .then(resp => {
                            this.loadIndex = false;
                            if (!resp.data.status) {
                                alert(resp.data.message);
                            } else {
                                this.karyawan = resp.data.data;
                                console.log(this.karyawan)

                                let modalKaryawan = new bootstrap.Modal(document.getElementById(
                                    'modalKaryawanDetail'), {
                                    keyboard: false
                                });
                                modalKaryawan.show();
                            }
                        });
                },
                karyawanDelete(nomor_induk) {
                    let c = confirm("Are you sure to delete this record data?");
                    if (c) {
                        this.loadIndex = true;
                        axios.delete(`{{ url('api/soal1/karyawan/delete') }}/${nomor_induk}`)
                            .then(resp => {
                                if (!resp.data.status) {
                                    this.loadIndex = false;
                                    alert(resp.data.message);
                                } else {
                                    this.changeTab(this.tab);
                                }
                            });
                    }
                },

                /**
                 * Manage Cuti
                 */
                emptyCuti() {
                    this.cuti = {
                        nomor_induk: "",
                        tanggal_cuti: "",
                        lama_cuti: "",
                        keterangan: ""
                    }
                },
                listNomorInduk() {
                    axios.get('{{ url('api/soal1/karyawan/list-nomor-induk') }}').then(resp => {
                        this.loadIndex = false;
                        this.list_nomor_induk = resp.data.data;

                        console.log(this.list_nomor_induk)
                    });
                },
                cutiIndex() {
                    // get data cuti
                    axios.get('{{ url('api/soal1/cuti') }}', {
                        params: {
                            page: this.page,
                            limit: this.limit,
                            search: this.search,
                        }
                    }).then(resp => {
                        this.loadIndex = false;
                        this.data = resp.data.data;
                    });
                },
                cutiCreate() {
                    let params = {
                        nomor_induk: this.cuti.nomor_induk,
                        tanggal_cuti: this.cuti.tanggal_cuti,
                        lama_cuti: this.cuti.lama_cuti,
                        keterangan: this.cuti.keterangan
                    }
                    this.loadIndex = true;
                    axios.post('{{ url('api/soal1/cuti/create') }}', params)
                        .then(resp => {
                            this.loadIndex = false;
                            if (!resp.data.status) {
                                alert(resp.data.message);
                                this.add();
                            } else {
                                this.emptyCuti();
                                this.modal.hide();
                                this.changeTab(this.tab);
                            }
                        });
                },
                cutiUpdate() {
                    let params = {
                        nomor_induk: this.cuti.nomor_induk,
                        tanggal_cuti: this.cuti.tanggal_cuti,
                        lama_cuti: this.cuti.lama_cuti,
                        keterangan: this.cuti.keterangan
                    }
                    console.log(params);
                    this.loadIndex = true;
                    axios.patch('{{ url('api/soal1/cuti/update') }}', params)
                        .then(resp => {
                            this.loadIndex = false;
                            if (!resp.data.status) {
                                alert(resp.data.message);
                            } else {
                                this.emptyCuti();
                                this.modal.hide();
                                this.changeTab(this.tab);
                            }
                        });
                },
                cutiDelete(i) {
                    let c = confirm("Are you sure to delete this record data?");
                    if (c) {
                        let cuti = this.data[i];
                        this.loadIndex = true;
                        axios.delete(
                                `{{ url('api/soal1/cuti/delete') }}/${cuti.nomor_induk}/${cuti.tanggal_cuti}`)
                            .then(resp => {
                                if (!resp.data.status) {
                                    this.loadIndex = false;
                                    alert(resp.data.message);
                                } else {
                                    this.changeTab(this.tab);
                                }
                            });
                    }
                },
            }
        });
    </script>
@endpush
