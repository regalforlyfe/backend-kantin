@extends('layout.base')
@section('title')
Pembeli
@endsection
@section('content')                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered display no-wrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:1px">No</th>
                                                <th>Avatar</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <img src="../assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle"width="40">
                                                </td>
                                                <td>Techno</td>
                                                <td>xhunterikii@gmail.com</td>
                                                <td>
                                                    <div class="btn-group">
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