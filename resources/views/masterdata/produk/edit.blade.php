@extends('layout.base')
@section('title')
Edit Produk
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="updateData()" @keydown="form.onKeydown($event)">
                <div class="modal-body mx-4">
                        <div class="form-row">
                            <label class="col-lg-2" for="id_toko">Toko Penjual</label>
                            <div class="form-group col-md-8">
                                <select v-model="form.id_toko" onchange="selectTrigger()" style="width: 100%"
                                    id="id_toko" class="form-control custom-select">
                                    <option v-for="item in id_toko" :value="item.id">@{{ item.nama_toko }}</option>
                                </select>
                                <has-error :form="form" field="id_toko"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="id_kategori">Kategori</label>
                            <div class="form-group col-md-8">
                                <select v-model="form.id_kategori" id="id_kategori" onchange="selectTrigger()"
                                    style="width: 100%" class="form-control custom-select">
                                    <option v-for="item in id_kategori" :value="item.id">
                                        @{{  item.nama_kategori }}</option>
                                </select>
                                <has-error :form="form" field="id_kategori"></has-error>
                            </div>          
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="nama_produk">Nama Produk</label>
                            <div class="form-group col-md-8">
                                <input v-model="form.nama_produk" id="nama_produk" type="text"
                                    placeholder="Masukkan nama produk" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('nama_produk') }">
                                <has-error :form="form" field="nama_produk"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="deskripsi">Deskripsi</label>
                            <div class="form-group col-md-8">
                            <input v-model="form.deskripsi" id="deskripsi" type="text" placeholder="Masukkan deskripsi produk"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('deskripsi') }">
                            <has-error :form="form" field="deskripsi"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="harga">Harga</label>
                            <div class="form-group col-md-8">
                            <input v-model="form.harga" id="harga" type="number" placeholder="Masukkan harga"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('harga') }">
                            <has-error :form="form" field="harga"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="gambar">Foto Produk 1</label>
                                <div class="form-group col-md-8">
                                    <div class="">
                                        <div class="input-group">
                                            <input v-model="form.gambar" onchange="imageTrigger()" type="search" id="foto_produk"
                                                placeholder="Tambah Foto Produk 1" class="form-control ">
                                            <div class="input-group-append">
                                                <a data-fancybox="" data-type="iframe"
                                                    data-src="/filemanager/dialog.php?type=1&field_id=gambar&relative_url=1">
                                                    <button type="button" class="btn btn-outline-secondary">Cari</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <has-error :form="form" field="foto_produk"></has-error>
                                </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="gambar">Foto Produk 2</label>
                                <div class="form-group col-md-8">
                                    <div class="">
                                        <div class="input-group">
                                            <input v-model="form.gambar" onchange="imageTrigger()" type="search" id="foto_produk"
                                                placeholder="Tambah Foto Produk 2" class="form-control ">
                                            <div class="input-group-append">
                                                <a data-fancybox="" data-type="iframe"
                                                    data-src="/filemanager/dialog.php?type=1&field_id=gambar&relative_url=1">
                                                    <button type="button" class="btn btn-outline-secondary">Cari</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <has-error :form="form" field="foto_produk"></has-error>
                                </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="gambar">Foto Produk 3</label>
                                <div class="form-group col-md-8">
                                    <div class="">
                                        <div class="input-group">
                                            <input v-model="form.gambar" onchange="imageTrigger()" type="search" id="foto_produk"
                                                placeholder="Tambah Foto Produk" class="form-control ">
                                            <div class="input-group-append">
                                                <a data-fancybox="" data-type="iframe"
                                                    data-src="/filemanager/dialog.php?type=1&field_id=gambar&relative_url=1">
                                                    <button type="button" class="btn btn-outline-secondary">Cari</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <has-error :form="form" field="foto_produk"></has-error>
                                </div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <a href="{{route('produk.index')}}"><button type="button" class="btn btn-light" data-dismiss="modal">Batal</button></a>
                        <button v-show="!editMode" type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    var getProduk = @json($produk);
    var getKategori = @json($kategori);
    var getToko = @json($toko);

    var app = new Vue({
        el: '#app',
        data: {
            mainData: [],
            editMode: false,
            form: new Form({
                id: getProduk.id,
                nama_produk: getProduk.nama_produk,
                deskripsi: getProduk.deskripsi,
                harga: getProduk.harga,
                foto_produk: getProduk.foto_produk,
                id_toko: getToko.id_toko,
                id_kategori: getKategori.id_kategori,
            }),
            id_toko: @json($toko),
            id_kategori: @json($kategori),
        },
        mounted() {
            $('#default_table').DataTable()
            this.refreshData()
        },
        methods: {
            editModal(data) {
                this.editMode = true;
                this.form.fill(data)
                this.form.clear();
            },
            updateData() {
                url = "{{ route('produk.update', ':id') }}".replace(':id', this.form.id)
                this.form.put(url)
                    .then(response => {
                        $('#defaultModal').modal('hide');
                        Swal.fire(
                            'Berhasil',
                            'Produk Berhasil diubah',
                            'success'
                        ).then((value) => {
                            window.location = "{{route('produk.index')}}"
                        })
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            },
            refreshData() {
                axios.get("{{ route('produk.all') }}")
                    .then(response => {
                        $('#default_table').DataTable().destroy()
                        this.mainData = response.data
                        this.$nextTick(function () {
                            $('#default_table').DataTable();
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
