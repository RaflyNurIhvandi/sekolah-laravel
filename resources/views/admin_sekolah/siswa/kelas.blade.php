@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach ($data as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Daftar kelas
        <b>
            @foreach ($data as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    <button class="btn btn-secondary btn-sm mt-3" style="width: 150px;" onclick="add_kelas()">Tambah Kelas</button>
    <form action="" class="float-end">
        <div class="d-flex">
            <label for="jumlahsiswaperkelas" class="form-label mt-4 me-2">Jumlah Siswa Per - Kelas</label>
            <input type="text" name="" id="" class="form-control mt-3" style="width: 100px;">
        </div>
    </form>
    <div class="form-add-kelas" id="form-add-kelas">
        <div class="add-kelas">
            <span class="close" id="close-add" onclick="cl_add()">&times;</span>
            <h4 class="mt-2 mb-4">Tambah Daftar Kelas</h4>
            <form action="/tambah/daftar_kelas/sekolah" method="POST">
                @csrf
                @foreach($data as $i)
                    <input type="hidden" name="npsn" id="npsn" value="{{ $i->npsn }}">
                @endforeach
                <div class="mb-3">
                    <label for="urutankelas" class="form-label">Kelas (angka)</label>
                    <input type="text" name="urutankelas" id="urutankelas" class="form-control" placeholder="Urutan berdasarkan tingkat kelas. exp: 10, 11, 12">
                </div>
                <div class="mb-3">
                    <label for="tingkatkelas" class="form-label">Tingkat Kelas</label>
                    <input type="text" name="tingkatkelas" id="tingkatkelas" class="form-control" placeholder="example: I, VII, XI">
                </div>
                <div class="mb-3">
                    <label for="abjadkelas" class="form-label">Abjad Kelas</label>
                    <input type="text" name="abjadkelas" id="abjadkelas" class="form-control" placeholder="excample: A, B, C, D">
                </div>
                <div class="mb-2 mt-4">
                    <button type="button" class="btn btn-secondary btn-sm" style="width: 100px;" onclick="sv()">SIMPAN</button>
                    <button type="button" class="btn btn-secondary btn-sm" style="width: 100px;" onclick="cl()">CENCEL</button>
                    <button type="submit" id="simpan" hidden></button>
                    <button type="reset" id="reset" hidden></button>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-3">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-calendar me-2"></i>
                @foreach($data as $i)
                    Daftar Kelas <b>{{ $i->nama_sekolah }}</b>
                @endforeach
            </div>
            <div class="card-body">
                <table id="dataKelasSekolah" class="table-striped">
                    <thead>
                        <tr>
                            <th>No Kelas</th>
                            <th>No Jurusan</th>
                            <th>Tingkat</th>
                            <th>Abjad</th>
                            <th>Kelas (angka)</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kelas as $k)
                            <tr>
                                <td>{{ $k->no_kelas }}</td>
                                <td>{{ $k->no_jurusan }}</td>
                                <td>{{ $k->tingkat }}</td>
                                <td>{{ $k->abjad }}</td>
                                <td>{{ $k->urutan }}</td>
                                <td>
                                    <center>
                                        <button type="button" class="btn" value="edit_{{ $k->no_kelas }}" onclick="edt_kel(this)"><i class="fa fa-pencil" style="color: rgb(0, 255, 42)"></i></button>
                                        <button type="button" class="btn" value="hapus_{{ $k->no_kelas }}" onclick="del_kel(this)"><i class="fa fa-trash" style="color: rgb(255, 0, 0)"></i></button>
                                        <a href="/delete/kelas/{{ $k->no_kelas }}" id="hapus_{{ $k->no_kelas }}" hidden></a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @foreach($kelas as $i)
        <div id="edit_{{ $i->no_kelas }}" class="form-edit">
            <div class="content-form-edit">
                <span class="close-edit" value="edit_{{ $i->no_kelas }}" onclick="cl_edit(this)" data-set="res_{{ $i->no_kelas }}">&times;</span>
                <h4 class="mb-3">Edit Kelas</h4>
                <form action="/update/edit/kelas/{{ $i->no_kelas }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="urutankelas" class="form-label">Kelas (angka)</label>
                        <input type="text" name="urutankelas" id="urutankelas" class="form-control" value="{{ $i->urutan }}">
                    </div>
                    <div class="mb-3">
                        <label for="tingkatkelas" class="form-label">Tingkat Kelas</label>
                        <input type="text" name="tingkatkelas" id="tingkatkelas" class="form-control" value="{{ $i->tingkat }}">
                    </div>
                    <div class="mb-3">
                        <label for="abjadkelas" class="form-label">Abjad Kelas</label>
                        <input type="text" name="abjadkelas" id="abjadkelas" class="form-control" value="{{ $i->abjad }}">
                    </div>
                    <div class="mb-2 mt-4">
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100px;" value="simpan_edit_{{ $i->no_kelas }}" onclick="sv_edt_kls(this)">SIMPAN</button>
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100px;" onclick="ccl_edit(this)" value="edit_{{ $i->no_kelas }}" data-res="res_{{ $i->no_kelas }}">CENCEL</button>
                        <button type="reset" id="res_{{ $i->no_kelas }}" hidden></button>
                        <button type="submit" id="simpan_edit_{{ $i->no_kelas }}" hidden></button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
@section('css')
    {{-- edit kelas --}}
    <style>
        .close-edit:hover,
        .close-edit:focus{
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .close-edit{
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .content-form-edit{
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            border-radius: 7px;
        }
        .form-edit{
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
    {{-- end edit kelas --}}
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
        .add-kelas{
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            border-radius: 7px;
        }
        .form-add-kelas{
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
@endsection
@section('js')
    <script>
        function ccl_edit(obj){
            Swal.fire({
                title: 'Anda yakin?',
                text: "Data yang diubah akan kembali seperti semula!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('value')).style.display = 'none'
                    document.getElementById(obj.getAttribute('data-res')).click()
                }
            })
        }
        function sv_edt_kls(obj){
            Swal.fire({
                title: 'Anda yakin?',
                text: "Pastikan data yang diisi sudah benar!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('value')).click()
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
        function cl_edit(obj){
            document.getElementById(obj.getAttribute('value')).style.display = 'none'
            document.getElementById(obj.getAttribute('data-set')).click()
        }
        function edt_kel(obj){
            document.getElementById(obj.getAttribute('value')).style.display = 'block'
        }
        function del_kel(obj){
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
                    document.getElementById(obj.getAttribute('value')).click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'berhasil menghapus data',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function cl(){
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
                    document.getElementById('reset').click()
                    document.getElementById('close-add').click()
                }
            })
        }
        function sv(){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Pastikan data yg diisi sudah benar!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('simpan').click()
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
        function cl_add(){
            document.getElementById('form-add-kelas').style.display = 'none'
            document.getElementById('reset').click()
        }
        function add_kelas(){
            document.getElementById('form-add-kelas').style.display = 'block'
        }
    </script>
@endsection
