@extends('layout.base')
@section('title')
Kategori
@endsection
@section('content')                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{route('kategori.create')}}"><button type="button" class="btn btn-primary btn-rounded mb-3"><i class="fas fa-plus-circle"></i> Tambah Kategori </button></a>
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:1px">No</th>
                                                <th>Kategori</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item, index in mainData" :key="index">
                                                <td>@{{ index+1 }}</td>
                                                <td>@{{ item.nama_kategori != 'null' ? item.nama_kategori : ''  }}</td>
                                                <td>@{{ item.deskripsi != 'null' ? item.deskripsi : ''  }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                    <a v-bind:href="getUrl(item.id)" @click="editModal(item.id)"
                                                        class="text-success" data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Edit"><i class="btn btn-warning btn-sm far fa-edit"></i></a>
                                                    <a href="javascript:void(0);" @click="deleteData(item.id)" class="text-danger"
                                                        data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i
                                                            class="btn btn-danger btn-sm far fa-trash-alt"></i></a>
                                                        </form>
                                                    </div>
                                                </td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            mainData: @json($data),
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
            getUrl(id) {
                url = "kategori/" + id + "/edit"
                return url
            },
            editModal(data) {
                this.form.fill(data)
                this.form.clear();
            },
            deleteData(id) {

                swal.fire({
                    title: 'Apakah anda yakin ingin menghapus?',
                    text: "Anda tidak akan bisa mengembalikannya lagi!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidak, Batalkan!',
                    reverseButtons: true
                }).then((result) => {

                    if (result.value) {
                        url = "{{ route('kategori.destroy', ':id') }}".replace(':id', id)
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
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swal.fire(
                            'Canceled',
                            'Your data not deleted',
                            'error'
                        )
                    }
                })
            },

            refreshData() {
                axios.get("{{ route('kategori.all') }}")
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