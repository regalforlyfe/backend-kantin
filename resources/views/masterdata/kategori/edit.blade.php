@extends('layout.base')
@section('title')
Edit Kategori
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="updateData()" @keydown="form.onKeydown($event)">
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
    var getKategori = @json($kategori);

    var app = new Vue({
        el: '#app',
        data: {
            mainData: [],
            editMode: false,
            form: new Form({
                id: getKategori.id,
                nama_kategori: getKategori.nama_kategori,
                deskripsi: getKategori.deskripsi,
            }),
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
                url = "{{ route('kategori.update', ':id') }}".replace(':id', this.form.id)
                this.form.put(url)
                    .then(response => {
                        $('#defaultModal').modal('hide');
                        Swal.fire(
                            'Berhasil',
                            'Kategori Berhasil di Ubah',
                            'success'
                        ).then((value) => {
                            window.location = "{{route('kategori.index')}}"
                        })
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
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
