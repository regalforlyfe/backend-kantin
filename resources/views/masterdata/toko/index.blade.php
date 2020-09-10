@extends('layout.base')
@section('title')
Toko
@endsection
@section('content')                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <a href="{{route('toko.create')}}"><button type="button" class="btn btn-primary btn-rounded mb-3"><i class="fas fa-plus-circle"></i> Tambah Toko </button></a>
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:1px">No</th>
                                                <th>Toko</th>
                                                <th>Penjual</th>
                                                <th>Rating</th>
                                                <th>Status</th>
                                                <th>Verifikasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item, index in mainData" :key="index">
                                                <td>@{{ index+1 }}</td>
                                                <td>@{{ item.nama_toko != 'null' ? item.nama_toko : ''  }}</td>
                                                <td>@{{ item.seller != 'null' ? item.seller : ''  }}</td>
                                                <td>@{{ item.rating != 'null' ? item.rating : ''  }}</td>
                                                <td>
                                                    <button class="btn btn-success btn-sm">@{{ item.status != 'null' ? item.status : ''  }}</button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a v-bind:href="getUrl(item.id)" @click="editModal(item.id)"
                                                            class="text-success" data-toggle="tooltip" data-placement="top"
                                                                data-original-title="Edit"><i class="btn btn-warning btn-sm far fa-edit"></i></a>
                                                        <button class="btn btn-info btn-sm fas fa-image"></button>
                                                        <a href="javascript:void(0);" @click="deleteData(item.id)" class="text-danger"
                                                            data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i
                                                                class="btn btn-danger btn-sm far fa-trash-alt"></i></a>
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
            toko: @json($data),
            form: new Form({
                id: '',
                nama_toko: '',
                deskripsi: '',
                alamat: '',
                hari_buka: '',
                waktu_buka: '',
                waktu_tutup: '',
                metode_pembayaran: '',
                metode_pengiriman: '',
                whatsapp: '',
                maps: '',
                instagram: '',
                facebook: '',
                tokopedia: '',
                shopee: '',
                foto_toko: '',
                id_penjual: '',
                rating: '',
                status: '',
                verifikasi: '',
            }),
        },
        mounted() {
            $('#default_table').DataTable()
            this.refreshData()
        },
        methods: {
            getUrl(id) {
                url = "toko/" + id + "/edit"
                return url
            },
            editModal(data) {
                this.form.fill(data)
                this.form.clear();
            },
            deleteData(id) {

                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to restore this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {

                    if (result.value) {
                        url = "{{ route('toko.destroy', ':id') }}".replace(':id', id)
                        this.form.delete(url)
                            .then(response => {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
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
                axios.get("{{ route('toko.all') }}")
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