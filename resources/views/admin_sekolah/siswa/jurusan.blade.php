@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach ($data as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Jurusan
        <b>
            @foreach ($data as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    <button type="button" class="btn btn-secondary btn-sm mt-3" style="width: 150px;" onclick="add_jurusan()">Tambah Jurusan</button>
    <button type="button" class="btn btn-secondary btn-sm mt-3" style="width: 150px;" onclick="reload_halaman()">Reload Halaman</button>
    <div class="add-jurusan" id="add-jurusan">
        <div class="content-add-jurusan">
            <span class="close" onclick="close_add_jurusan()">&times;</span>
            <h4 class="mt-2 mb-3">Tambah Jurusan</h4>
            <form action="/tambah/jurusan_sekolah" method="POST">
                @csrf
                @foreach($data as $i)
                    <input type="hidden" id="npsn" name="npsn" value="{{ $i->npsn }}">
                @endforeach
                <div class="mb-3">
                    <label for="namajurusan" class="form-label">Nama Jurusan</label>
                    <input type="text" name="namajurusan" id="namajurusan" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="subjekjurusan" class="form-label">Subjek Jurusan</label>
                    <textarea name="subjekjurusan" id="subjekjurusan" rows="2" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="deskripsijurusan" class="form-label">Deskripsi Jurusan</label>
                    <textarea name="deskripsijurusan" id="deskripsijurusan" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-2 mt-4">
                    <button type="button" class="btn btn-secondary btn-sm" style="width: 130px;" onclick="sv_jurusan()">SIMPAN</button>
                    <button type="button" class="btn btn-secondary btn-sm" style="width: 130px;" onclick="cl_jurusan()">CENCEL</button>
                    <button type="reset" id="rs-jurusan" hidden></button>
                    <button type="submit" id="simpan-jurusan" hidden></button>
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <i class="fa fa-calendar"></i>
            @foreach($data as $i)
                Data Jurusan <b>{{ $i->nama_sekolah }}</b>
            @endforeach
        </div>
        <div class="card-body">
            <table id="dataJurusan" class="table-striped">
                <thead>
                    <tr>
                        <th>No Jurusan</th>
                        <th>Nama Jurusan</th>
                        <th>Subjek Jurusan</th>
                        <th>Deskripsi Jurusan</th>
                        <th>Kelas</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jurusan as $j)
                        <tr>
                            <td>{{ $j->no_jurusan }}</td>
                            <td>{{ $j->nama_jurusan }}</td>
                            <td>{{ $j->subjek_jurusan }}</td>
                            <td>{{ $j->deskripsi_jurusan }}</td>
                            <td>
                                @foreach($keljur as $k)
                                    @if($j->no_jurusan == $k->no_jurusan)
                                        <li style="list-style-type:none;"><i class="fa fa-circle fa-2xs me-2"></i>{{ $k->tingkat }} {{ $k->abjad }}</li>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <center>
                                    <button class="btn btn-sm" data-edit-jurusan="edit_jurusan_{{ $j->no_jurusan }}" onclick="edit_jurusan(this)"><i class="fa fa-pencil fa-lg" style="color: rgb(60, 255, 0); cursor: pointer;"></i></button>
                                    <button class="btn btn-sm" data-hapus-jurusan="hapus_jurusan_{{ $j->no_jurusan }}" onclick="hapus_jurusan(this)"><i class="fa fa-trash fa-lg" style="color: red; cursor: pointer;"></i></button>
                                    <a href="/hapus/jurusan/sekolah/{{ $j->no_jurusan }}" id="hapus_jurusan_{{ $j->no_jurusan }}" hidden></a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @foreach($jurusan as $j)
        <div id="edit_jurusan_{{ $j->no_jurusan }}" class="form-edit-jurusan">
            <div class="content-form-edit-jurusan">
                <span class="close-edit-jurusan" onclick="close_edit_jurusan(this)" data-close-edit="edit_jurusan_{{ $j->no_jurusan }}" data-reset-edit="">&times;</span>
                <h4 class="mt-2 mb-3">Edit Jurusan</h4>
                <form action="/update/jurusan/{{ $j->no_jurusan }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="namajurusan" class="form-label">Nama Jurusan</label>
                        <input type="text" name="namajurusan" id="namajurusan" class="form-control" value="{{ $j->nama_jurusan }}">
                    </div>
                    <div class="mb-3">
                        <label for="subjekjurusan" class="form-label">Subjek Jurusan</label>
                        <textarea name="subjekjurusan" id="subjekjurusan" class="form-control" rows="2">{{ $j->subjek_jurusan }}</textarea>
                    </div>
                    <div class="mb-2">
                        <label for="deskripsijurusan" class="form-label">Deskripsi Jurusan</label>
                        <textarea name="deskripsijurusan" id="deskripsijurusan" class="form-control" rows="3">{{ $j->deskripsi_jurusan }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="daftarkelas" class="form-label">Daftar Kelas</label><br>
                        <button type="button" class="btn btn-secondary btn-sm mb-2" onclick="add_kelas(this)" id="btn-add" data-dialog-kelas="data_add_kelas_{{ $j->no_jurusan }}"><i class="fa fa-plus fa-xl"></i></button>
                        @foreach($keljur as $k)
                            @if($j->no_jurusan == $k->no_jurusan)
                                <div class="isi-kotak-kelas mb-2" id="daftar_kelas_{{ $k->no_kelas }}">
                                    <span class="hapus-kelas" onclick="close_daftar_kelas(this)" data-hapus-kelas="daftar_kelas_{{ $k->no_kelas }}" data-req-input="hapus_kelas_{{ $k->no_kelas }}" data-no-kelas="{{ $k->no_kelas }}">x</span>
                                    <center>
                                        {{ $k->tingkat }} {{ $k->abjad }}
                                    </center>
                                </div>
                                <input type="text" name="hapus_kelas_{{ $k->no_kelas }}" id="hapus_kelas_{{ $k->no_kelas }}" hidden>
                            @endif
                         @endforeach
                         {{-- add kelas --}}
                         <div class="tambah-kelas" id="data_add_kelas_{{ $j->no_jurusan }}">
                            <div class="content-tambah-kelas">
                                <span class="close-tambah-kelas" onclick="close_tambah_kelas(this)" data-close-dialog-add="data_add_kelas_{{ $j->no_jurusan }}">&times;</span>
                                <h4 class="mt-2 mb-4">Tambah Kelas</h4>
                                <table class="table table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <td>Nama Kelas</td>
                                            <td>Add</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kelas as $kl)
                                            <tr>
                                                <td>{{ $kl->tingkat }} {{ $kl->abjad }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" onclick="tambah_kelas_jurusan(this)" data-tambah-kelas="add_kelas_jurusan_{{ $kl->no_kelas }}" data-id-where="tambah_kelas_jurusan_{{ $kl->no_kelas }}" data-id-submit="save_tambah_kelas{{ $kl->no_kelas }}" data-value-add="{{ $j->no_jurusan }}" data-where-kelas="{{ $kl->no_kelas }}"><i class="fa fa-plus fa-lg"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- end add kelas --}}
                    </div>
                    <button type="button" class="btn btn-success btn-sm" style="width: 120px;" data-id-save-update-jurusan="save_edit_jurusan_{{ $j->no_jurusan }}" onclick="save_edit_jur(this)">SIMPAN</button>
                    <button type="submit" id="save_edit_jurusan_{{ $j->no_jurusan }}" hidden></button>
                </form>
            </div>
        </div>
        <div class="form-tambah-kelas">
            @foreach($kelas as $kl)
                <form action="/tambah/kelas/jurusan" method="POST">
                    @csrf
                    @method("PUT")
                    <input type="text" name="tambah_kelas_{{ $kl->no_kelas }}" id="add_kelas_jurusan_{{ $kl->no_kelas }}">
                    <input type="text" name="where_kelas_{{ $kl->no_kelas }}" id="tambah_kelas_jurusan_{{ $kl->no_kelas }}">
                    <button type="submit" id="save_tambah_kelas{{ $kl->no_kelas }}"></button>
                </form>
            @endforeach
        </div>
    @endforeach
@endsection
@section('css')
    {{-- edit jurusan --}}
    <style>
        .form-tambah-kelas{
            display: none;
        }
        .close-tambah-kelas:hover,
        .close-tambah-kelas:focus{
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .close-tambah-kelas{
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .content-tambah-kelas{
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 25%;
            border-radius: 7px;
        }
        .tambah-kelas{
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .add-kelas:hover,
        .add-kelas:focus{
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .add-kelas{
            color: #aaaaaa;
            font-size: 35px;
            font-weight: bold;
        }
        .hapus-kelas:hover,
        .hapus-kelas:focus{
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .hapus-kelas{
            color: #aaaaaa;
            float: right;
            font-size: 14px;
            font-weight: bold;
            margin-right: 7%;
            margin-top: 2%;
        }
        .isi-kotak-kelas{
            border: 1px solid #c5c5c5;
            border-radius: 6px;
            padding: 0.3%;
            width: 100px;
        }
        .close-edit-jurusan:hover,
        .close-edit-jurusan:focus{
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .close-edit-jurusan{
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .content-form-edit-jurusan{
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 7px;
        }
        .form-edit-jurusan{
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
    </style>
    {{-- end edit jurusan --}}
    {{-- add jurusan --}}
    <style>
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .content-add-jurusan{
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 7px;
        }
        .add-jurusan{
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
    </style>
    {{-- end add jurusan --}}
@endsection
@section('js')
    <script>
        function save_edit_jur(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Pastikan data yang diisi sudah benar!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('data-id-save-update-jurusan')).click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data berhasil disimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function hapus_jurusan(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('data-hapus-jurusan')).click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Berhasil menghapus data',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function reload_halaman(){
            Swal.fire({
                title: 'Reload?',
                text: "Semua data yang belum tersimpan akan dikembalikan seperti semula!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reload now!'
                }).then((result) => {
                if (result.isConfirmed) {
                    let timerInterval
                    Swal.fire({
                        title: 'Melakukan reload halaman!',
                        html: 'Halaman akan reload dalam <b></b> milliseconds.',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                            window.location.reload();
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('I was closed by the timer')
                        }
                    })
                }
            })
        }
        function tambah_kelas_jurusan(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Anda ingin memasukan kelas ini kedalam jurusan!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('data-tambah-kelas')).value = obj.getAttribute('data-value-add')
                    document.getElementById(obj.getAttribute('data-id-where')).value = obj.getAttribute('data-where-kelas')
                    Swal.fire({
                        title: 'Kelas telah ditambahkan!',
                        text: "Simpan kelas yang sudah ditambahkan?",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(obj.getAttribute('data-id-submit')).click()
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Data berhasil disimpan',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    })
                }
            })
        }
        function close_tambah_kelas(obj){
            document.getElementById(obj.getAttribute('data-close-dialog-add')).style.display ='none'
        }
        function add_kelas(obj){
            document.getElementById(obj.getAttribute('data-dialog-kelas')).style.display = 'block'
        }
        function close_daftar_kelas(obj){
            document.getElementById(obj.getAttribute('data-hapus-kelas')).style.display = 'none'
            document.getElementById(obj.getAttribute('data-req-input')).value = obj.getAttribute('data-no-kelas')
        }
        function close_edit_jurusan(obj){
            document.getElementById(obj.getAttribute('data-close-edit')).style.display = 'none'
        }
        function edit_jurusan(obj){
            document.getElementById(obj.getAttribute('data-edit-jurusan')).style.display = 'block'
        }
        function cl_jurusan(){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang diisi akan hilang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('add-jurusan').style.display = 'none'
                    document.getElementById('rs-jurusan').click()
                }
            })
        }
        function sv_jurusan(){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Pastikan data yang diisi sudah benar!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('simpan-jurusan').click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data berhasil disimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function close_add_jurusan(){
            document.getElementById('add-jurusan').style.display = 'none'
        }
        function add_jurusan(){
            document.getElementById('add-jurusan').style.display = 'block'
        }
    </script>
@endsection
