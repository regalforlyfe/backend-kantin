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
                                            <tr>
                                                <td>1</td>
                                                <td>5ADSF0</td>
                                                <td>07 September 2020 11:06</td>
                                                <td>Albab</td>
                                                <td>Warung Bu Bagja</td>
                                                <td>Gado - Gado</td>
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