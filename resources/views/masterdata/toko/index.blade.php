@extends('layout.base')
@section('title')
Toko
@endsection
@section('content')                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary btn-rounded mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</button>
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
                                            <tr>
                                                <td>1</td>
                                                <td>Techno</td>
                                                <td>Albab</td>
                                                <td>Belum ada rating</td>
                                                <td>
                                                    <button class="btn btn-success btn-sm">AKTIF</button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success btn-circle "><i class="fa fa-check"></i></button>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-warning btn-sm far fa-edit"></button>
                                                        <button class="btn btn-info btn-sm fas fa-image"></button>
                                                        <button class="btn btn-danger btn-sm  far fa-trash-alt"></button>
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