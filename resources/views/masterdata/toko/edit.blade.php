@extends('layout.base')
@section('title')
Tambah Toko
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="updateData()" @keydown="form.onKeydown($event)">
                    <div class="modal-body mx-4">
                        <div class="form-row">
                            <label class="col-lg-2" for="nama_toko">Nama Toko</label>
                            <div class="form-group col-md-8">
                                <input v-model="form.nama_toko" id="nama_toko" type="text"
                                    placeholder="Input nama toko" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('nama_toko') }">
                                <has-error :form="form" field="nama_toko"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                                <label class="col-lg-2" for="deskripsi">Deskripsi</label>
                                <div class="form-group col-md-8">
                                    <textarea v-model="form.deskripsi" id="deskripsi" type="text"
                                        placeholder="Masukkan deskripsi toko" class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('deskripsi') }"></textarea>
                                    <has-error :form="form" field="deskripsi"></has-error>
                                </div>
                            </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="alamat">Alamat</label>
                            <div class="form-group col-md-8">
                            <textarea v-model="form.alamat" id="alamat" type="text" placeholder="Input alamat toko"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('alamat') }"></textarea>
                            <has-error :form="form" field="alamat"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="hari_buka">Hari Buka</label>
                            <div class="form-group col-md-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hariBukaSenin"
                                        value="senin">
                                    <label class="form-check-label" for="senin">Senin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hariBukaSelasa"
                                        value="selasa">
                                    <label class="form-check-label" for="selasa">Selasa</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hariBukaRabu"
                                        value="rabu">
                                    <label class="form-check-label" for="rabu">Rabu</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hariBukaKamis"
                                        value="kamis">
                                    <label class="form-check-label" for="kamis">Kamis</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hariBukaJumat"
                                        value="jumat">
                                    <label class="form-check-label" for="jumat">Jumat</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hariBukaSabtu"
                                        value="sabtu">
                                    <label class="form-check-label" for="sabtu">Sabtu</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hariBukaMinggu"
                                        value="minggu">
                                    <label class="form-check-label" for="minggu">Minggu</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="waktu_buka">Waktu Buka</label>
                            <div class="form-group col-md-8">
                            <input v-model="form.waktu_buka" id="waktu_buka" type="time"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('waktu_buka') }">
                            <has-error :form="form" field="waktu_buka"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="waktu_tutup">Waktu Tutup</label>
                            <div class="form-group col-md-8">
                            <input v-model="form.waktu_tutup" id="waktu_tutup" type="time"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('waktu_tutup') }">
                            <has-error :form="form" field="waktu_tutup"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="metode_pembayaran">Metode Pembayaran</label>
                            <div class="form-group col-md-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="pembayaranCash"
                                        value="cash">
                                    <label class="form-check-label" for="cash">Cash</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="pembayaranGopay"
                                        value="gopay">
                                    <label class="form-check-label" for="gopay">Gopay</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="pembayaranOvo"
                                        value="ovo">
                                    <label class="form-check-label" for="ovo">OVO</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="metode_pengiriman">Metode Pengiriman</label>
                            <div class="form-group col-md-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="pengirimanAntar"
                                        value="antar">
                                    <label class="form-check-label" for="antar">Antar</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="pengirimanOjek"
                                        value="ojek">
                                    <label class="form-check-label" for="ojek">Ojek Online</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="pengirimanPaket"
                                        value="paket">
                                    <label class="form-check-label" for="paket">Paket</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="pengirimanJemput"
                                        value="jemput">
                                    <label class="form-check-label" for="jemput">Jemput</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="whatsapp">Whatsapp</label>
                            <div class="form-group col-md-8">
                            <input v-model="form.whatsapp" id="whatsapp" type="tel" placeholder="Input nomor whatsapp"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('whatsapp') }">
                            <has-error :form="form" field="whatsapp"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="maps">Maps</label>
                            <div class="form-group col-md-8">
                            <input v-model="form.maps" id="maps" type="url" placeholder="Input link maps"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('maps') }">
                            <has-error :form="form" field="maps"></has-error>
                            </div>
                        </div>
                        <hr/>
                        <br/>
                        <div class="form-row">
                            <label class="col-lg-2" for="instagram">Instagram</label>
                            <div class="form-group col-md-8">
                            <input v-model="form.instagram" id="instagram" type="text" placeholder="Input instagram toko"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('instagram') }">
                            <has-error :form="form" field="instagram"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="facebook">Facebook</label>
                            <div class="form-group col-md-8">
                            <input v-model="form.facebook" id="facebook" type="text" placeholder="Input facebook toko"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('facebook') }">
                            <has-error :form="form" field="facebook"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="tokopedia">Tokopedia</label>
                            <div class="form-group col-md-8">
                            <input v-model="form.tokopedia" id="tokopedia" type="text" placeholder="Input tokopedia toko"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('tokopedia') }">
                            <has-error :form="form" field="tokopedia"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="shopee">Shopee</label>
                            <div class="form-group col-md-8">
                            <input v-model="form.shopee" id="shopee" type="text" placeholder="Input shopee toko"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('shopee') }">
                            <has-error :form="form" field="shopee"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="foto_toko">Foto Toko</label>
                            <div class="form-group col-md-8">
                            <input v-model="form.foto_toko" id="foto_toko" type="file"
                                class="form-control-file" :class="{ 'is-invalid': form.errors.has('foto_toko') }">
                            <has-error :form="form" field="foto_toko"></has-error>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <a href="{{route('toko.index')}}"><button type="button" class="btn btn-light" data-dismiss="modal">Batal</button></a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
    var getToko = @json($toko)

    var app = new Vue({
        el: '#app',
        data: {
            mainData: [],
            form: new Form({
                id: getToko.id,
                nama_toko: getToko.nama_toko,
                deskripsi: getToko.deskripsi,
                alamat: getToko.alamat,
                hari_buka: getToko.hari_buka,
                waktu_buka: getToko.waktu_buka,
                waktu_tutup: getToko.waktu_tutup,
                metode_pembayaran: '',
                metode_pengiriman: '',
                whatsapp: getToko.whatsapp,
                maps: getToko.maps,
                instagram: getToko.instagram,
                facebook: getToko.facebook,
                tokopedia: getToko.tokopedia,
                shopee: getToko.shopee,
                foto_toko: '',
                id_penjual: getToko.id_penjual,
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
            editModal(data) {
                this.editMode = true;
                this.form.fill(data)
                this.form.clear();
            },
            updateData() {
                url = "{{ route('toko.update', ':id') }}".replace(':id', this.form.id)
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
                axios.get("{{ route('toko.all') }}")
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
