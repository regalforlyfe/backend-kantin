@extends('layout.base')
@section('title')
Penjual
@endsection
@section('content')                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary btn-rounded float-right mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</button>
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered display no-wrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:1px">No</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Techno</td>
                                                <td>xhunterikii@gmail.com</td>
                                                <td>
                                                    <button class="btn btn-success btn-sm far">AKTIF</button>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-warning btn-sm far fa-edit"></button>
                                                        <button class="btn btn-danger btn-sm far fa-trash-alt" type="submit"></button>
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