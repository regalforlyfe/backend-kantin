@extends('layout.base')
@section('title')
Order
@endsection
@section('content')                
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:1px">No</th>
                                <th>Kode Order</th>
                                <th>Tanggal Waktu</th>
                                <th>Pembeli</th>
                                <th>Toko</th>
                                <th>Produk</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item, index in mainData" :key="index">
                                <td>@{{ index+1 }}</td>
                                <td>@{{ item.kode_order != 'null' ? item.kode_order : ''  }}</td>
                                <td>@{{ item.created_at != 'null' ? item.created_at : ''  }}</td>
                                <td>@{{ item.pembeli.nama != 'null' ? item.pembeli.nama  : ''  }}</td>
                                <td>@{{ item.toko.nama_toko != 'null' ? item.toko.nama_toko : ''  }}</td>
                                <td>@{{ item.produk.nama_produk != 'null' ? item.produk.nama_produk: ''  }}</td>
                                <td>
                                    <button class="btn btn-success btn-sm">ORDER SUSKES</button>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-info btn-sm"><i class="fas fa-shopping-cart"></i></button>
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
                kode_order: '',
                jumlah: '',
                id_pembeli: '',
                id_toko: '',
                id_produk: '',
                created_at: '',
            }),
        },
        mounted() {
            $('#default_table').DataTable()
            this.refreshData()
        },
        methods: {
            getUrl(id) {
                url = "order/" + id + "/cart"
                return url
            },
            editModal(data) {
                this.form.fill(data)
                this.form.clear();
            },

            refreshData() {
                axios.get("{{ route('order.all') }}")
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