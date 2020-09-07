@extends('layout.base')
@section('title')
Tambah Kategori
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="storeData()" @keydown="form.onKeydown($event)">
                    <div class="modal-body mx-4">
                        <div class="form-row">
                            <label class="col-lg-2" for="nama_kategori">Nama Kategori</label>
                            <div class="form-group col-md-8">
                                <input v-model="form.nama_kategori" id="nama_kategori" type="text"
                                    placeholder="Input nama kategori" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('nama_kategori') }">
                                <has-error :form="form" field="nama_kategori"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="deskripsi">Deskripsi</label>
                            <div class="form-group col-md-8">
                            <input v-model="form.deskripsi" id="deskripsi" type="text" placeholder="Input deskripsi kategori"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('deskripsi') }">
                            <has-error :form="form" field="deskripsi"></has-error>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <a href="{{route('kategori.index')}}"><button type="button" class="btn btn-light" data-dismiss="modal">Batal</button></a>
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
