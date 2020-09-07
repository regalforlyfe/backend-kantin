@extends('layout.base')
@section('title')
Report By Viewers
@endsection
@section('content')                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Pilih Toko</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Techno</option>
                                        <option>Warung Bu Bagja</option>
                                        <option>Nasi Goreng Pak Mukidi</option>
                                        </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection