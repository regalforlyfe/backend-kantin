@extends('layout.base')
@section('title')
Tambah Produk
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="storeData()" @keydown="form.onKeydown($event)">
                    <div class="modal-body mx-4">
                        <div class="form-row">
                            <label class="col-lg-2" for="id_penjual">Toko Penjual</label>
                            <div class="form-group col-md-8">
                                <select v-model="form.id_penjual" onchange="selectTrigger()" style="width: 100%"
                                    id="id_penjual" class="form-control custom-select">

                                    <option v-for="item in toko" :value="item.id">@{{ item.nama_toko }}</option>
                                </select>
                                <has-error :form="form" field="id_penjual"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="nama_kategori">Kategori</label>
                            <select class="custom-select form-group col-md-8" id="inlineFormCustomSelect">
                                <!-- <option selected>Pilih Kategori</option> -->
                                <option value="1">Makanan</option>
                                <option value="2">Minuman</option>
                                <option value="3">Pakaian</option>
                            </select>            
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="nama_kategori">Nama Produk</label>
                            <div class="form-group col-md-8">
                                <input v-model="form.nama_produk" id="nama_produk" type="text"
                                    placeholder="nama produk" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('nama_produk') }">
                                <has-error :form="form" field="nama_produk"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="deskripsi">Deskripsi</label>
                            <div class="form-group col-md-8">
                            <input v-model="form.deskripsi" id="deskripsi" type="text" placeholder="deskripsi produk"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('deskripsi') }">
                            <has-error :form="form" field="deskripsi"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="deskripsi">Harga</label>
                            <div class="form-group col-md-8">
                            <input v-model="form.harga" id="harga" type="number" placeholder="harga"
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
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
    var app = new Vue({
        el: '#app',
        data: {
            mainData: [],
            form: new Form({
                id: '',
                nama_kategori: '',
                deskripsi: '',
            }),
        },
        mounted() {
            $('#default_table').DataTable()
            this.refreshData()
        },
        methods: {
            storeData() {
                this.form.post("{{ route('kategori.store') }}")

                    .then(response => {
                        $('#defaultModal').modal('hide');
                        Swal.fire(
                            'Berhasil!',
                            'Kategori berhasil ditambahkan',
                            'berhasil'
                        ).then((value)=> {
                            this.refreshData()
                            window.location = "{{route('kategori.index')}}"
                        })
                        
                    })
                    .catch(error => {
                        console.log(error)
                        Swal.close();
                        try {
                            errors = Object.values(error.response.data.errors).map(msg => msg[0])
                            errors = errors.join()
                            } catch (e){
                                errors = e
                            }
                            Swal.fire ({
                            icon: 'error',
                            title: 'Oops..',
                            text: errors,
                        })
                    })
                        
            },
            refreshData() {
                axios.get("{{ route('kategori.all') }}")
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
