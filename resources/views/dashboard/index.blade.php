@extends('layout.base')
@section('title')
Dashboard
@endsection
@section('content')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <!-- Column -->
                                    @if(Auth::user()->tipe_user=='admin')
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-primary text-center">
                                                <h1 class="font-light text-white">@{{ banyakPenjual }}</h1>
                                                <h6 class="text-white">Penjual</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-cyan text-center">
                                                <h1 class="font-light text-white">@{{ banyakPembeli }}</h1>
                                                <h6 class="text-white">Pembeli</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-success text-center">
                                                <h1 class="font-light text-white">@{{ banyakKategori }}</h1>
                                                <h6 class="text-white">Kategori</h6>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(Auth::user()->tipe_user=='penjual')
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-cyan text-center">
                                                <h1 class="font-light text-white">@{{ banyakToko }}</h1>
                                                <h6 class="text-white">Toko</h6>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-danger text-center">
                                                <h1 class="font-light text-white">@{{ banyakProduk }}</h1>
                                                <h6 class="text-white">Produk</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
@endsection

@push('script')
<script>
    var app = new Vue({
        el: '#app',
        data: {
            banyakToko: @json($toko),
            banyakProduk: @json($produk),
            banyakKategori: @json($kategori),
            banyakPenjual: @json($penjual),
            banyakPembeli: @json($pembeli),
        },
    })

</script>
@endpush