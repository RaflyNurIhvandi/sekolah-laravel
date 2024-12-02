@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach ($data as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Jadwal Pelajaran
        <b>
            @foreach ($data as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    <button type="button" class="btn btn-secondary btn-sm mt-3" onclick="tambah_kelas()">Tambah Kelas</button>
    <div class="tambah-kelas" id="tbh-kls">
        <div class="konten-tambah-kelas">
            <span class="close" onclick="cls_tambah_kelas()">&times;</span>
            <h4 class="mt-2">Tambah Kelas</h4>
            <div class="form-tambah-kelas mt-3">
                <form action="/tambah/kelas/jadwal" method="POST">
                    @csrf
                    @foreach($data as $i)
                        <input type="hidden" name="npsn" id="npsn" value="{{ $i->npsn }}">
                    @endforeach
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Pilih Jurusan</label>
                        <select name="jurusan" id="jurusan" class="form-select" onchange="pilih_jurusan()">
                            <option selected disabled>Pilih Jurusan</option>
                            @foreach($jurusan as $j)
                                <option value="{{ $j->no_jurusan }}">{{ $j->nama_jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tingkatkelas" class="form-label">Tingkat Kelas</label>
                        <select class="form-select" name="tingkatkelas" id="tingkatkelas" onchange="tingkat_kelas()">
                            <option selected disabled>Pilih Tingkat Kelas</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="abjadkelas" class="form-label">Abjad Kelas</label>
                        <select class="form-select" name="abjadkelas" id="abjadkelas">
                            <option selected disabled>Pilih Abjad</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea name="catatan" id="catatan" rows="3" class="form-control"></textarea>
                    </div>
                    <button type="button" class="btn btn-success btn-sm me-2" style="width: 100px"
                        onclick="simpan_tambah_kelas()">Simpan</button>
                    <button type="button" class="btn btn-danger btn-sm" style="width: 100px"
                        onclick="cencel_tambah_kelas()">Cencel</button>
                    <button type="submit" id="save-tambah-kelas" hidden></button>
                    <button type="reset" id="reset-tambah-kelas" hidden></button>
                </form>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <i class="fa fa-calendar me-2"></i>
            @foreach($data as $i)
                Jadwal pelajaran sekolah <b>{{ $i->nama_sekolah }}</b>
            @endforeach
        </div>
        <div class="card-body">
            <table id="tabelDataKelas" class="table-striped">
                <thead>
                    <tr>
                        <th>Jurusan</th>
                        <th>Tingkat Kelas</th>
                        <th>Abjad Kelas</th>
                        <th>Catatan</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kelas as $i)
                        <tr>
                            <td>{{ $i->nama_jurusan }}</td>
                            <td>{{ $i->tingkat_kelas }}</td>
                            <td>{{ $i->abjad_kelas }}</td>
                            <td>{{ $i->catatan }}</td>
                            <td>
                                <center>
                                    <a href="/edit/jadwal/kelas/{{ $i->no_kelas }}" class="btn"><i class="fa fa-pencil fa-lg" style="color: rgb(2, 247, 2)"></i></a>
                                    <button type="button" class="btn" onclick="del_kelas(this)" value="{{ $i->no_kelas }}"><i class="fa fa-trash fa-lg" style="color: rgb(247, 2, 2)"></i></button>
                                    <a href="/hapus/jadwal/{{ $i->no_kelas }}" id="{{ $i->no_kelas }}" hidden></a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('css')
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

        .konten-tambah-kelas {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 10px;
        }

        .tambah-kelas {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }
    </style>
@endsection
@section('js')
    <script>
        function pilih_jurusan(){
            var jur = document.getElementById('jurusan').value
            if(jur == jur){
                document.getElementById('tingkatkelas').innerHTML = ""
                var seljur = document.getElementById('tingkatkelas')
                var optjur = `<option selected disabled>Pilih Tingkat Kelas</option>`
                seljur.innerHTML += optjur
                var db = "http://localhost:8000/json/data/kelas"
                var get = { method : "Get" }
                fetch(db, get)
                .then(res => res.json())
                .then((json)=>{
                    var ar = json
                    var filjur = ar.filter(function(i){
                        return i.no_jurusan == jur
                    })
                    var groupBy = (element, key) => {
                        return element.reduce((value, x) => {
                            (value[x[key]] = "")
                            return value;
                        }, {})
                    }
                    var grb = groupBy(filjur, "tingkat")
                    var ph = Object.keys(grb)
                    ph.forEach((obj)=>{
                        var op = document.getElementById('tingkatkelas')
                        var msk = `<option value="${obj}">${obj}</option>`
                        op.innerHTML += msk
                    })
                })
            }
        }
        function tingkat_kelas(){
            var kel = document.getElementById('tingkatkelas').value
            if(kel == kel){
                document.getElementById('abjadkelas').innerHTML = ""
                var selkel = document.getElementById('abjadkelas')
                var optgl = `<option selected disabled>Pilih Abjad</option>`
                selkel.innerHTML += optgl
                var dbs = "http://localhost:8000/json/data/abjad"
                var st = { method : "Get" }
                fetch(dbs, st)
                .then(res => res.json())
                .then((json)=>{
                    var arab = json
                    var filkel = arab.filter(function(i){
                        return i.tingkat == kel
                    })
                    var groupBy = (element, key) => {
                        return element.reduce((value, x) => {
                            (value[x[key]] = "")
                            return value;
                        }, {})
                    }
                    var grb = groupBy(filkel, "abjad")
                    var phs = Object.keys(grb)
                    phs.forEach((obj)=>{
                        var opt = document.getElementById('abjadkelas')
                        var msks = `<option value="${obj}">${obj}</option>`
                        opt.innerHTML += msks
                    })
                })
            }
        }
    </script>
    {{-- hapus --}}
    <script>
        function del_kelas(obj){
            // alert(obj.getAttribute('id'))
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
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
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
    </script>
    {{-- end hapus --}}

    {{-- tambah --}}
    <script>
        function cencel_tambah_kelas() {
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
                    document.getElementById('reset-tambah-kelas').click()
                    document.getElementById('tbh-kls').style.display = 'none'
                }
            })
        }
        function simpan_tambah_kelas() {
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
                    document.getElementById('save-tambah-kelas').click()
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

        function cls_tambah_kelas() {
            document.getElementById('tbh-kls').style.display = 'none'
        }

        function tambah_kelas() {
            document.getElementById('tbh-kls').style.display = 'block'
        }
    </script>
    {{-- end tambah --}}
@endsection
