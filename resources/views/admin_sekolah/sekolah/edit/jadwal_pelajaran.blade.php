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
    @foreach ($kelas as $i)
        <h5 class="mt-3">Kelas : {{ $i->tingkat_kelas }} {{ $i->abjad_kelas }}</h5>
    @endforeach
    <button type="button" class="btn btn-secondary btn-sm mt-2 me-2" style="width: 120px" onclick="edit_kls()">Edit
        Kelas</button>
    <button type="button" class="btn btn-secondary btn-sm mt-2" style="width: 120px" onclick="tambah_jadwal()">Tambah Jadwal</button>
    {{-- form edit kelas --}}
    <div class="edit-kelas" id="edit-kelas">
        <div class="konten-edit-kelas">
            <span class="close" id="close-edit-kelas">&times;</span>
            <h4 class="mt-2">Edit Kelas</h4>
            <div class="mt-3">
                @foreach ($kelas as $i)
                    <form action="/update/kelas/{{ $i->no_kelas }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-select" onchange="pilih_jurusan()">
                                <option value="{{ $i->jurusan }}" selected>{{ $i->nama_jurusan }}</option>
                                @foreach($jurusan as $j)
                                    @if($j->no_jurusan == $i->jurusan)
                                    @else
                                        <option value="{{ $j->no_jurusan }}">{{ $j->nama_jurusan }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tingkatkelas" class="form-label">Tingkat Kelas</label>
                            <select name="tingkatkelas" id="tingkatkelas" class="form-select" onchange="pilih_kelas()">
                                <option value="{{ $i->tingkat_kelas }}" selected disabled>{{ $i->tingkat_kelas }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="abjadkelas" class="form-label">Abjad Kelas</label>
                            <select name="abjadkelas" id="abjadkelas" class="form-select">
                                <option value="{{ $i->abjad_kelas }}" selected disabled>{{ $i->abjad_kelas }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea name="catatan" id="catatan" class="form-control" rows="3">{{ $i->catatan }}</textarea>
                        </div>
                        <div class="mb-2">
                            <button type="button" class="btn btn-success btn-sm me-2" style="width: 100px;"
                                onclick="simpan_edit_kelas()">Simpan</button>
                            <button type="reset" class="btn btn-secondary btn-sm me-2" style="width: 100px;"
                                id="reset-edit-kelas">Reset</button>
                            <button type="button" class="btn btn-danger btn-sm" style="width: 100px;"
                                onclick="cencel_edit_kelas()">Cencel</button>
                            <button type="submit" id="sv-edit-kls" hidden></button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
    {{-- end form edit kelas --}}
    {{-- form tambah jadwal --}}
    <div class="tambah-jadwal" id="tambah-jadwal">
        <div class="konten-tambah-jadwal">
            <span class="close-tambah-jadwal" id="close-tambah-jadwal">&times;</span>
            <h4 class="mt-2">Tambah Jadwal</h4>
            <div class="mt-3">
                <form action="/tambah/jadwal" method="POST">
                    @csrf
                    @foreach($kelas as $i)
                        <input type="hidden" name="nokelas" id="nokelas" value="{{ $i->no_kelas }}">
                    @endforeach
                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari</label>
                        <select class="form-select" name="hari" id="hari">
                            <option selected disabled>Pilih Hari</option>
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jum'at</option>
                            <option value="sabtu">Sabtu</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="no" class="form-label">Urutan ke / No</label>
                        <input type="text" name="no" id="no" class="form-control">
                    </div>
                    <div class="mb-3 d-flex">
                        <div style="width: 49%; margin-right: 2%;">
                            <label for="mulaijam" class="form-label">Mulai Jam</label>
                            <input type="text" name="mulaijam" id="mulaijam" class="form-control">
                        </div>
                        <div style="width: 49%;">
                            <label for="selesaijam" class="form-label">Selesai Jam</label>
                            <input type="text" name="selesaijam" id="selesaijam" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="namaguru" class="form-label">Nama Guru</label>
                        <select name="namaguru" id="namaguru" class="form-select" onchange="nama_guru()">
                            <option selected disabled>Pilih Guru</option>
                            @foreach($dafgur as $d)
                                <option value="{{ $d->nama }}">{{ $d->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="mapel" class="form-label">Mata Pelajaran</label>
                        <select name="mapel" id="mapel" class="form-select">
                            <option disabled selected>Pilih Mapel</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <button type="button" class="btn btn-success btn-sm me-2" style="width: 100px;"
                            id="simpan-tambah-jadwal" onclick="simpan_tambah_jadwal()">Simpan</button>
                        <button type="reset" class="btn btn-secondary btn-sm me-2" style="width: 100px;"
                            id="reset-tambah-jadwal" onclick="res_add()">Reset</button>
                        <button type="button" class="btn btn-danger btn-sm" style="width: 100px;"
                            id="cencel-tambah-jadwal" onclick="cencel_tambah_jadwal()">Cencel</button>
                        <button type="submit" id="sv-tambah-jadwal" hidden></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end tambah jadwal --}}
    {{-- senin & selasa --}}
    <div class="d-flex mt-3">
        <div class="card" style="width: 48%; margin-right: 4%;">
            <div class="card-header">
                <i class="fa fa-calendar me-2"></i>
                <b>Senin</b>
            </div>
            <div class="card-body">
                <table id="tableJadwalSenin" class="table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jam</th>
                            <th>Nama Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($senin as $i)
                            <tr>
                                <td>{{ $i->no_urut_jadwal }}</td>
                                <td>{{ $i->jam_mulai }} - {{ $i->jam_selesai }}</td>
                                <td>{{ $i->nama_guru }}</td>
                                <td>{{ $i->mapel }}</td>
                                <td>
                                    <center>
                                        <a href="/edit/mapel/{{ $i->no_jadwal }}" class="btn btn-sm"><i class="fa fa-pencil" style="color: rgb(2, 247, 2)"></i></a>
                                        <button class="btn btn-sm" onclick="hapus_jadwal(this)" value="{{ $i->no_jadwal }}"><i class="fa fa-trash" style="color: rgb(247, 2, 2)"></i></button>
                                        <a href="/hapus/mapel/{{ $i->no_jadwal }}" id="{{ $i->no_jadwal }}" hidden></a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card" style="width: 48%;">
            <div class="card-header">
                <i class="fa fa-calendar me-2"></i>
                <b>Selasa</b>
            </div>
            <div class="card-body">
                <table id="tableJadwalSelasa" class="table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jam</th>
                            <th>Nama Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($selasa as $i)
                            <tr>
                                <td>{{ $i->no_urut_jadwal }}</td>
                                <td>{{ $i->jam_mulai }} - {{ $i->jam_selesai }}</td>
                                <td>{{ $i->nama_guru }}</td>
                                <td>{{ $i->mapel }}</td>
                                <td>
                                    <center>
                                        <a href="/edit/mapel/{{ $i->no_jadwal }}" class="btn btn-sm"><i class="fa fa-pencil" style="color: rgb(2, 247, 2)"></i></a>
                                        <button class="btn btn-sm" onclick="hapus_jadwal(this)" value="{{ $i->no_jadwal }}"><i class="fa fa-trash" style="color: rgb(247, 2, 2)"></i></button>
                                        <a href="/hapus/mapel/{{ $i->no_jadwal }}" id="{{ $i->no_jadwal }}" hidden></a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- end --}}
    {{-- rabu & kamis --}}
    <div class="d-flex mt-5">
        <div class="card" style="width: 48%; margin-right: 4%;">
            <div class="card-header">
                <i class="fa fa-calendar me-2"></i>
                <b>Rabu</b>
            </div>
            <div class="card-body">
                <table id="tableJadwalRabu" class="table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jam</th>
                            <th>Nama Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rabu as $i)
                            <tr>
                                <td>{{ $i->no_urut_jadwal }}</td>
                                <td>{{ $i->jam_mulai }} - {{ $i->jam_selesai }}</td>
                                <td>{{ $i->nama_guru }}</td>
                                <td>{{ $i->mapel }}</td>
                                <td>
                                    <center>
                                        <a href="/edit/mapel/{{ $i->no_jadwal }}" class="btn btn-sm"><i class="fa fa-pencil" style="color: rgb(2, 247, 2)"></i></a>
                                        <button class="btn btn-sm" onclick="hapus_jadwal(this)" value="{{ $i->no_jadwal }}"><i class="fa fa-trash" style="color: rgb(247, 2, 2)"></i></button>
                                        <a href="/hapus/mapel/{{ $i->no_jadwal }}" id="{{ $i->no_jadwal }}" hidden></a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card" style="width: 48%;">
            <div class="card-header">
                <i class="fa fa-calendar me-2"></i>
                <b>Kamis</b>
            </div>
            <div class="card-body">
                <table id="tableJadwalKamis" class="table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jam</th>
                            <th>Nama Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kamis as $i)
                            <tr>
                                <td>{{ $i->no_urut_jadwal }}</td>
                                <td>{{ $i->jam_mulai }} - {{ $i->jam_selesai }}</td>
                                <td>{{ $i->nama_guru }}</td>
                                <td>{{ $i->mapel }}</td>
                                <td>
                                    <center>
                                        <a href="/edit/mapel/{{ $i->no_jadwal }}" class="btn btn-sm"><i class="fa fa-pencil" style="color: rgb(2, 247, 2)"></i></a>
                                        <button class="btn btn-sm" onclick="hapus_jadwal(this)" value="{{ $i->no_jadwal }}"><i class="fa fa-trash" style="color: rgb(247, 2, 2)"></i></button>
                                        <a href="/hapus/mapel/{{ $i->no_jadwal }}" id="{{ $i->no_jadwal }}" hidden></a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- end --}}
    {{-- jum'at & sabtu --}}
    <div class="d-flex mt-5">
        <div class="card" style="width: 48%; margin-right: 4%;">
            <div class="card-header">
                <i class="fa fa-calendar me-2"></i>
                <b>Jum'at</b>
            </div>
            <div class="card-body">
                <table id="tableJadwalJumat" class="table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jam</th>
                            <th>Nama Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jumat as $i)
                            <tr>
                                <td>{{ $i->no_urut_jadwal }}</td>
                                <td>{{ $i->jam_mulai }} - {{ $i->jam_selesai }}</td>
                                <td>{{ $i->nama_guru }}</td>
                                <td>{{ $i->mapel }}</td>
                                <td>
                                    <center>
                                        <a href="/edit/mapel/{{ $i->no_jadwal }}" class="btn btn-sm"><i class="fa fa-pencil" style="color: rgb(2, 247, 2)"></i></a>
                                        <button class="btn btn-sm" onclick="hapus_jadwal(this)" value="{{ $i->no_jadwal }}"><i class="fa fa-trash" style="color: rgb(247, 2, 2)"></i></button>
                                        <a href="/hapus/mapel/{{ $i->no_jadwal }}" id="{{ $i->no_jadwal }}" hidden></a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card" style="width: 48%;">
            <div class="card-header">
                <i class="fa fa-calendar me-2"></i>
                <b>Sabtu</b>
            </div>
            <div class="card-body">
                <table id="tableJadwalSabtu" class="table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jam</th>
                            <th>Nama Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sabtu as $i)
                            <tr>
                                <td>{{ $i->no_urut_jadwal }}</td>
                                <td>{{ $i->jam_mulai }} - {{ $i->jam_selesai }}</td>
                                <td>{{ $i->nama_guru }}</td>
                                <td>{{ $i->mapel }}</td>
                                <td>
                                    <center>
                                        <a href="/edit/mapel/{{ $i->no_jadwal }}" class="btn btn-sm"><i class="fa fa-pencil" style="color: rgb(2, 247, 2)"></i></a>
                                        <button class="btn btn-sm" onclick="hapus_jadwal(this)" value="{{ $i->no_jadwal }}"><i class="fa fa-trash" style="color: rgb(247, 2, 2)"></i></button>
                                        <a href="/hapus/mapel/{{ $i->no_jadwal }}" id="{{ $i->no_jadwal }}" hidden></a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- end --}}
@endsection
@section('css')
    {{-- tambah jadwal --}}
    <style>
        .close-tambah-jadwal {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-tambah-jadwal:hover,
        .close-tambah-jadwal:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .konten-tambah-jadwal {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 7px;
        }

        .tambah-jadwal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }
    </style>
    {{-- end --}}
    {{-- edit kelas --}}
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

        .konten-edit-kelas {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            border-radius: 7px;
        }

        .edit-kelas {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }
    </style>
    {{-- end --}}
@endsection
@section('js')
    <script>
        function pilih_kelas(){
            var kel = document.getElementById('tingkatkelas').value
            if(kel == kel){
                document.getElementById('abjadkelas').innerHTML = ""
                var tkls = document.getElementById('abjadkelas')
                var valin = `<option value="{{ $i->abjad_kelas }}" selected disabled>{{ $i->abjad_kelas }}</option>`
                tkls.innerHTML += valin
                var db = "http://localhost:8000/json/data/abjad"
                var get = { method : "Get" }
                fetch(db, get)
                .then(res => res.json())
                .then((json)=>{
                    var ar = json
                    var filjur = ar.filter(function(i){
                        return i.tingkat == kel
                    })
                    var groupBy = (element, key) => {
                        return element.reduce((value, x) => {
                            (value[x[key]] = "")
                            return value;
                        }, {})
                    }
                    var grb = groupBy(filjur, "abjad")
                    var ph = Object.keys(grb)
                    ph.forEach((obj)=>{
                        var op = document.getElementById('abjadkelas')
                        var msk = `<option value="${obj}">${obj}</option>`
                        op.innerHTML += msk
                    })
                })
            }
        }
        function pilih_jurusan(){
            var jur = document.getElementById('jurusan').value
            if(jur == jur){
                document.getElementById('tingkatkelas').innerHTML = ""
                var tkls = document.getElementById('tingkatkelas')
                var valin = `<option value="{{ $i->tingkat_kelas }}" selected disabled>{{ $i->tingkat_kelas }}</option>`
                tkls.innerHTML += valin
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
        function res_add(){
            document.getElementById('mapel').innerHTML = ''
            var ml = document.getElementById('mapel')
            var op = `<option selected disabled>Pilih Mapel</option>`
            ml.innerHTML += op
        }
        function nama_guru(){
            var gur = document.getElementById('namaguru').value
            if(gur == gur){
                document.getElementById('mapel').innerHTML = ""
                var selkel = document.getElementById('mapel')
                var optgl = `<option selected disabled>Pilih Mapel</option>`
                selkel.innerHTML += optgl
                var dbs = "http://localhost:8000/json/data/mapel"
                var st = { method : "Get" }
                fetch(dbs, st)
                .then(res => res.json())
                .then((json)=>{
                    var arab = json
                    var filgur = arab.filter(function(i){
                        return i.nama == gur
                    })
                    filgur.forEach((obj)=>{
                        var op = document.getElementById('mapel')
                        var opslc = `<option value="${obj.nama_mapel}">${obj.nama_mapel}</option>`
                        op.innerHTML += opslc
                    })
                })
            }
        }
    </script>
    {{-- mapel --}}
    <script>
        function hapus_jadwal(obj){
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
                        title: 'Data berhasil dihapus',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
    </script>
    {{-- end mapel --}}
    {{-- tambah jadwal --}}
    <script>
        function simpan_tambah_jadwal(){
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
                    document.getElementById('sv-tambah-jadwal').click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Kelas berhasil diupdate',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function cencel_tambah_jadwal(){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang dimasukan akan hilang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('close-tambah-jadwal').click()
                    document.getElementById('reset-tambah-jadwal').click()
                }
            })
        }
        function tambah_jadwal(){
            document.getElementById('tambah-jadwal').style.display = 'block'
        }
        var closetambah = document.getElementById('close-tambah-jadwal')
        closetambah.onclick = function(){
            document.getElementById('tambah-jadwal').style.display = 'none'
        }
    </script>
    {{-- end --}}
    {{-- edit kelas --}}
    <script>
        function edit_kls() {
            document.getElementById('edit-kelas').style.display = 'block'
        }
        var cls = document.getElementById('close-edit-kelas')
        cls.onclick = function() {
            document.getElementById('edit-kelas').style.display = 'none'
        }

        function cencel_edit_kelas() {
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang dimasukan akan hilang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('close-edit-kelas').click()
                    document.getElementById('reset-edit-kelas').click()
                }
            })
        }

        function simpan_edit_kelas() {
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
                    document.getElementById('sv-edit-kls').click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Kelas berhasil diupdate',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
    </script>
    {{-- end --}}
@endsection
