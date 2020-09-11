@extends('layout.base')
@section('title')
Penjual
@endsection
@section('content')                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary btn-rounded float-right mb-3"><i class="fas fa-plus-circle"></i> Tambah Penjual</button>
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered display no-wrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:1px">No</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="item, index in mainData" :key="index">
                                            <td>@{{ index+1 }}</td>
                                            <td>@{{ item.username == 'null' ? '' : item.username}}</td>
                                            <td>@{{ item.email== 'null' ? '' : item.email }}</td>
                                                <td>
                                                    <button class="btn btn-success btn-sm far">AKTIF</button>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" @click="editModal(item)" class="text-success"
                                                        data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i
                                                            class="btn btn-warning btn-sm far fa-edit"></i></a>
                                                    <a href="javascript:void(0);" @click="deleteData(item.id)" class="text-danger"
                                                        data-toggle="tooltip" data-placement="top" data-original-title="Hapus"><i
                                                            class="btn btn-danger btn-sm far fa-trash-alt"></i></a>
                                                </td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                <!-- MODAL -->
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="modal">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title" v-show="!editMode" id="myLargeModalLabel">Tambah Data</h4>
                <h4 class="modal-title" v-show="editMode" id="myLargeModalLabel">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form @submit.prevent="editMode ? updateData() : storeData()" @keydown="form.onKeydown($event)" id="form">
                <div class="modal-body mx-4">
                    <div class="form-row">
                        <label class="col-lg-2" for="Nama">Nama</label>
                        <div class="form-group col-md-8">
                            <input v-model="form.nama" id="nama" type="text" min=0 placeholder="Masukkan Nama"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('nama') }">
                            <has-error :form="form" field="nama"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="Username">Username</label>
                        <div class="form-group col-md-8">
                            <input v-model="form.username" id="username" type="text" min=0 placeholder="Masukkan Username"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('username') }">
                            <has-error :form="form" field="username"></has-error>
                        </div>
                    </div>
                    <!-- <div class="form-row">
                        <label class="col-lg-2" for="Profil">Foto Profil</label>
                        <div class="form-group col-md-8">
                            <div class="input-group-prepend">
                                <input v-model="form.profil" onchange="imageTrigger()" id="profil" type="text"
                                    placeholder="Please Select A Photo" readonly="readonly" class="form-control ">
                                <a data-fancybox="" data-type="iframe"
                                    data-src="/filemanager/dialog.php?type=1&field_id=profil&relative_url=1">
                                    <button type="button" class="btn btn-outline-secondary">Cari</button></a>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-row">
                        <label class="col-lg-2" for="member">Tipe User</label>
                        <div class="form-group col-md-8">
                            <select v-model="form.tipe_user" id="tipe_user" class="form-control custom-select"
                                {{-- :class="{ 'is-invalid': form.errors.has('tipe_user') }" --}} style="width: 100%">
                                <option value="penjual">penjual</option>
                            </select>
                            <has-error :form="form" field="tipe_user"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                            <label class="col-lg-2" for="tanggal_lahir">Tanggal Lahir</label>
                            <div class="form-group col-md-8">
                                <input v-model="form.tanggal_lahir" id="tanggal_lahir" type="date"
                                    placeholder="Input tanggal lahir" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('tanggal_lahir') }">
                                <has-error :form="form" field="tanggal_lahir"></has-error>
                            </div>
                        </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="Email">Email</label>
                        <div class="form-group col-md-8">
                            <div class="input-group-prepend">
                                <input v-model="form.email" id="email" type="email" min=0 placeholder="Masukkan Email"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                <has-error :form="form" field="email"></has-error>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="Password">Password</label>
                        <div class="form-group col-md-8">
                            <div class="input-group-prepend">
                                <input v-model="form.password" id="password" type="password"
                                    placeholder="Masukkan Password" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('password') }">
                                <has-error :form="form" field="password"></has-error>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button v-show="!editMode" type="submit" class="btn btn-primary">Simpan</button>
                    <button v-show="editMode" type="submit" class="btn btn-success">Ubah</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
    integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            mainData: [],
            editMode: false,
            form: new Form({
                id: '',
                nama: '',
                username: '',
                tipe_user: '',
                tanggal_lahir: '',
                email: '',
                password: '',
            }),
        },
        mounted() {
            $('#table').DataTable()
            this.refreshData()
            $('[data-fancybox]').fancybox({
                iframe: {
                    preload: false
                }
            })
        },
        methods: {
            createModal() {
                this.editMode = false;
                this.form.reset();
                this.form.clear();
                $('#modal').modal('show');
            },
            editModal(data) {
                this.editMode = true;
                this.form.fill(data)
                this.form.clear();
                $('#modal').modal('show');
            },
            storeData() {
                this.form.post("{{ route('user.store') }}")
                    .then(response => {
                        $('#modal').modal('hide');
                        this.refreshData()
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            },
            updateData() {
                url = "{{ route('user.update', ':id') }}".replace(':id', this.form.id)
                this.form.put(url)
                    .then(response => {
                        $('#modal').modal('hide');
                        this.refreshData()
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            },
            deleteData(id) {
                Swal.fire({
                    title: 'Apakah anda yakin ingin menghapus?',
                    text: "Anda tidak akan bisa mengembalikannya lagi!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidak, Batalkan!',
                }).then((result) => {
                    if (result.value) {
                        url = "{{ route('user.destroy', ':id') }}".replace(':id', id)
                        this.form.delete(url)
                            .then(response => {
                                Swal.fire(
                                    'Terhapus!',
                                    'Data Kategori telah terhapus.',
                                    'sukses'
                                )
                                this.refreshData()
                            })
                            .catch(e => {
                                e.response.status != 422 ? console.log(e) : '';
                            })
                    }
                })
            },
            refreshData() {
                axios.get("{{ route('user.penjual') }}")
                    .then(response => {
                        $('#table').DataTable().destroy()
                        this.mainData = response.data
                        this.$nextTick(function () {
                            $('#table').DataTable();
                        })
                    })
                    .catch(error => {
                        console.log(e)
                    })
            }
        },
    })
</script>
@endpush
